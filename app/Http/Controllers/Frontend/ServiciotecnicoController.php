<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Productos;
use App\Models\Categorias;
use App\Models\Proveedores;
use Yajra\DataTables\DataTables;
use DB;
use Transbank\Webpay\WebpayPlus;
use Transbank\Webpay\WebpayPlus\Transaction;
use Transbank\Webpay\Configuration;
use App\Models\Dispositivo;
use App\Models\Pedido;

class ServiciotecnicoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $repuestos = Productos::select('producto.*')
            ->join('categoria', 'producto.categoriaid', '=', 'categoria.idcategoria')
            ->where('categoria.nombre', 'Pantallas')
            ->orWhere('categoria.nombre', 'Flex Carga')
            ->paginate(8);
        $repuestosnot = DB::table('producto')
            ->select('*')
            ->join('categoria', 'producto.categoriaid', '=', 'categoria.idcategoria')
            ->where(function ($query) {
                $query->where('categoria.nombre', 'Pantallas')
                    ->orWhere('categoria.nombre', 'Flex Carga');
            })
            ->get();

        $productos = Productos::all();
        //return $products;
        return view("Frontend.Serviciotecnico.serviciotecnicoindex", compact('productos', 'repuestos'));
    }
    public function detalles(Request $request, $nombre)
    {
        $product = Productos::where('nombre_p', $nombre)->get();
        $palabras = str_word_count($nombre, 1);
        //return $palabras[0];
        $productossim = Productos::where('nombre_p', 'LIKE', '%' . $palabras[0] . '%')->get();

        //return $productosimilares;
        //$categorias = Categorias::all();
        $productos = Productos::all();
        //return $product;

        // !WEBPAY
        $commerceCode = env('WEBPAY_COMMERCE_CODE');
        $apiKeySecret = env('WEBPAY_API_KEY');

        //* coste servicio
        if ($product[0]->precio_venta_public <= 100000) {
            $servicio = 20000;
        } else if ($product[0]->precio_venta_public > 100000 && $product[0]->precio_venta_public <= 200000) {
            $servicio = 40000;
        } else if ($product[0]->precio_venta_public > 200000 && $product[0]->precio_venta_public <= 300000) {
            $servicio = 60000;
        } else if ($product[0]->precio_venta_public > 300000 && $product[0]->precio_venta_public <= 400000) {
            $servicio = 80000;
        }

        // Configurar la transacción
        $buy_order = "ztel" . rand();
        $session_id = uniqid();
        $amount = $product[0]->precio_venta_public + 10000 + $servicio;
        $return_url = route('wp_confirm', $product[0]->nombre_p) . '?action=getResult';

        // Crear instancia de la transacción
        $transaction = new Transaction();
        $transaction->configureForProduction($commerceCode, $apiKeySecret);
        $response = $transaction->create($buy_order, $session_id, $amount, $return_url);

        $url_tbk = $response->getUrl();
        $token = $response->getToken();

        return view('Frontend.Serviciotecnico.serviciotecnicodetalle', compact('product', 'productossim', 'url_tbk', 'token'));
        //return view("Frontend.Categoriasventa.categoriasventaindex");
    }

    public function wpconfirm(Request $request, $nombre)
    {
        $product = Productos::where('nombre_p', $nombre)->get();
        $palabras = str_word_count($nombre, 1);
        //return $palabras[0];
        $productossim = Productos::where('nombre_p', 'LIKE', '%' . $palabras[0] . '%')->get();
        //return $productosimilares;
        //$categorias = Categorias::all();
        $productos = Productos::all();

        $token = $_GET['token_ws'] ?? $_POST['token_ws'] ?? null;
        if (!$token) {
            // Revisa más detalles en Revisar más detalles más arriba en los distintos flujos y ejemplos de código de esto en https://github.com/TransbankDevelopers/transbank-sdk-php/examples/webpay-plus/index.php
            die('No es un flujo de pago normal.');
        }

        //* coste servicio
        if ($product[0]->precio_venta_public <= 100000) {
            $servicio_p = 20000;
        } else if ($product[0]->precio_venta_public > 100000 && $product[0]->precio_venta_public <= 200000) {
            $servicio_p = 40000;
        } else if ($product[0]->precio_venta_public > 200000 && $product[0]->precio_venta_public <= 300000) {
            $servicio_p = 60000;
        } else if ($product[0]->precio_venta_public > 300000 && $product[0]->precio_venta_public <= 400000) {
            $servicio_p = 80000;
        }

        $response = (new Transaction)->commit($token); // ó cualquiera de los métodos detallados en el ejemplo anterior del método create.
        $respuesta = json_encode($response);

        $servicio = array("id" => 1, "tipo" => "servicio", "nombre" => "Cambio de pantalla", "cantidad" => null, "precio" => $servicio_p);

        $producto_l = array("id" => 2, "id_p" => $product[0]->idproducto, "tipo" => "producto", "nombre" => $product[0]->nombre_p, "cantidad" => 1, "precio" => $response->amount - 10000 - $servicio_p);

        $lista = array(0 => $servicio, 1 => $producto_l);

        $lista_pedido = json_encode($lista);

        // usuario
        $user = auth()->guard('client')->user();

        if ($response->isApproved()) {
            $pedido = Pedido::create([
                'personaid' => $user->idpersona,
                'fecha' => now(),
                'monto' => $response->amount - 10000,
                'costo_envio' => 10000,
                'id_device' => $product[0]->id_device,
                'lista_pedido' => $lista_pedido,
                'status' => 1,
            ]);

            foreach ($lista as $item) {
                if ($item['tipo'] == 'producto' && isset($item['id_p']) && isset($item['cantidad'])) {
                    $producto = Productos::find($item['id_p']);
                    if ($producto) {
                        $cantidad = intval($item['cantidad']);
                        $producto->stock -= $cantidad;
                        $producto->save();
                    }
                }
            }

            return redirect()->route('orders.show', $pedido->idpedido);
        } else {
            // Transacción rechazada
            return "Pago rechazado";
        }
    }

    public function list_pedidos_servicio()
    {
        $user = auth()->guard('client')->user();
        $pedidos = Pedido::join('persona', 'pedido.personaid', '=', 'persona.idpersona')
            ->join('dispositivo', 'pedido.id_device', '=', 'dispositivo.id_device')
            ->select('pedido.*', 'pedido.status as estado_p', 'persona.*', 'persona.apellidos as persona_apellidos', 'dispositivo.*')
            ->where('pedido.personaid', $user->idpersona)
            ->orderBy('pedido.idpedido', 'desc')
            ->get();
        // return $pedidos;
        return view('Frontend.Ordenes.orderlist', compact('pedidos'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
