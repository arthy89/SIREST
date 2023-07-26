<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\Backend\Productos\ProdActReq;
use App\Http\Requests\Backend\Productos\ProductosRequest;
use App\Models\Productos;
use App\Models\Categorias;
use App\Models\Proveedores;
use App\Models\Dispositivo;
use Yajra\DataTables\DataTables;
use DB;

class ProductosController extends Controller
{
    public function __construct()
    {
        // only >< except
        $this->middleware('auth:web');
    }
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        //

        if ($request->ajax()) {
            $productos = DB::table('producto')
                ->join('categoria', function ($join) {
                    $join->on('producto.categoriaid', '=', 'categoria.idcategoria');
                })
                ->join('proveedor', function ($join) {
                    $join->on('producto.proveedorid', '=', 'proveedor.id_proveedor');
                })
                ->select('producto.nombre_p', 'proveedor.id_proveedor', 'proveedor.nombre_proveedor', 'producto.idproducto', 'producto.colores', 'categoria.nombre', 'producto.precio_compra', 'producto.stock', 'producto.imagen')->get();
            return DataTables::of($productos)
                ->addIndexColumn()
                ->addColumn('colores', function ($producto) {
                    $colos = $producto->colores;
                    $datos = explode(',', $colos);
                    $contador = 0;
                    $textog = "";

                    $textob = "<span class='badge bg-gradient-primary' style=' height: 20px; background:white; border:1px  solid #7b809a;  '> </span>";
                    $textor = "<span class='badge bg-gradient-primary' style=' height: 20px; background:red; border:1px  solid #7b809a;  '> </span>";
                    $textoa = "<span class='badge bg-gradient-primary' style=' height: 20px; background:DarkBlue; border:1px  solid #7b809a;  '> </span>";
                    $texton = "<span class='badge bg-gradient-primary' style=' height: 20px; background:black; border:1px  solid #7b809a;  '> </span>";
                    $textop = "<span class='badge bg-gradient-primary' style=' height: 20px; background:white; border:1px  solid #7b809a;  '> </span>";


                    //(blanco,rojo,azul)
                    foreach ($datos as $elemento) {
                        if ($elemento == "blanco") {
                            $textog = $textog . $textob;
                        } elseif ($elemento == "rojo") {
                            $textog = $textog . $textor;
                        } elseif ($elemento == "azul") {
                            $textog = $textog . $textoa;
                        } elseif ($elemento == "negro") {
                            $textog = $textog . $texton;
                        } elseif ($elemento == "plomo") {
                            $textog = $textog . $textop;
                        }
                    }
                    return $textog;
                })
                ->addColumn('img', function ($producto) {
                    if ($producto->imagen != null) {
                        $ruta = asset($producto->imagen);
                        $img = '<img src="' . $ruta . '" width="100px">';
                        return $img;
                    } else {
                        $ruta = asset("imgs/noimage.jpg");
                        $img = '<img src="' . $ruta . '" width="100px">';
                        return $img;
                    }
                })
                ->addColumn('action', function ($row) {
                    $ruta_editar =  route('editar_productos', $row->idproducto);
                    $ruta_eliminar = route('eliminar_productos', $row->idproducto);
                    $form = '<form action="' . $ruta_eliminar . '" method="POST" class="formulario">
                            ' . csrf_field() . '
                            ' . method_field("delete") . '
                            <a href="' . $ruta_editar . '" class="btn bg-gradient-info"><i class="material-icons">edit</i>EDITAR</a>
                            <button type="submit" class="btn bg-gradient-danger formulario"><i class="material-icons">delete</i>ELIMINAR</button>
                        </form>';
                    return $form;
                })
                //->addColumn('action', function($row){
                //    $form = '<a href="" class="btn bg-gradient-info"><i class="material-icons">edit</i> Editar</a>';
                //    turn $form;re
                //})
                ->rawColumns(['colores', 'img', 'action'])
                ->make(true);
        }

        return view("Backend.Productos.productosindex");
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        $categorias = Categorias::all();
        $proveedores = Proveedores::all();
        $dispositivos = Dispositivo::all();
        //return $categorias;

        return view('Backend.Productos.productoscrear', compact('categorias', 'proveedores', 'dispositivos'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(ProductosRequest $request)
    {
        //
        //return $request;

        if ($request->hasFile('archivo')) {
            $file = $request->file('archivo');
            $destinopath = 'imgs/productos/';
            $filename = time() . '-' . $file->getClientOriginalName();
            $uploadSuccess = $request->file('archivo')->move($destinopath, $filename);
            $ruta = $destinopath . $filename;
        }
        $producto = Productos::create([
            'categoriaid' => $request->categoriaid,
            'proveedorid' => $request->proveedorid,
            'id_device' => $request->deviceid,
            'nombre_p' => $request->nombre_producto,
            'descripcion' => $request->descripcion,
            'precio_compra' => $request->precio_compra,
            'precio_venta_mayor' => $request->precio_mayoreo,
            'precio_venta_public' => $request->precio_publico,
            //'colores' => json_encode($request->colores),
            'colores' => implode(',', $request->colores),
            'tags' => implode(',', $request->tags),
            'stock' => $request->stock_cantidad,
            'imagen' => $ruta
        ]);

        return redirect()->route('productos')->with('crear', 'ok');
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
    public function edit(Productos $producto)
    {

        $categorias = Categorias::all();
        $dispositivos = Dispositivo::all();
        $proveedores = Proveedores::all();
        // return $producto;
        return view('Backend.Productos.productosedit', compact('categorias', 'producto', 'proveedores', 'dispositivos'));
    }


    /**
     * Update the specified resource in storage.
     */
    public function update(ProdActReq $request, Productos $producto)
    {
        //
        //return $producto;
        //si conotiene archivo
        if ($request->hasFile('archivo')) {
            $a = explode('/', $producto->imagen);
            //return "llegando hasta aqui";
            $c = count($a);

            if ($c > 4) {
                unlink('imgs/productos/' . $a[5] . '');
            } else {
                //unlink('imgs/categorias/'.$a[5].'');

            }
            //unlink('imgs/categorias/'.$a[5].'');

            //return "ya elimino la webada";
            $file = $request->file('archivo');
            $destinopath = 'imgs/productos/';
            $filename = time() . '-' . $file->getClientOriginalName();
            $uploadSuccess = $request->file('archivo')->move($destinopath, $filename);
            $ruta = $destinopath . $filename;
            $producto->update([
                'categoriaid' => $request->categoriaid,
                'id_device' => $request->deviceid,
                'nombre_p' => $request->nombre_producto,
                'descripcion' => $request->descripcion,
                'precio_compra' => $request->precio_compra,
                'precio_venta_mayor' => $request->precio_mayoreo,
                'precio_venta_public' => $request->precio_publico,
                //'colores' => json_encode($request->colores),
                'colores' => implode(',', $request->colores),
                'tags' => implode(',', $request->tags),
                'stock' => $request->stock_cantidad,
                'imagen' => $ruta,
                'proveedorid' => $request->proveedor,
            ]);
            return redirect()->route('productos')->with('actualizar', 'ok');
            //si no contiener archivo no sobreponemos las imganes
        } else {
            $producto->update([
                'categoriaid' => $request->categoriaid,
                'id_device' => $request->deviceid,
                'nombre_p' => $request->nombre_producto,
                'descripcion' => $request->descripcion,
                'precio_compra' => $request->precio_compra,
                'precio_venta_mayor' => $request->precio_mayoreo,
                'precio_venta_public' => $request->precio_publico,
                //'colores' => json_encode($request->colores),
                'colores' => implode(',', $request->colores),
                'tags' => implode(',', $request->tags),
                'stock' => $request->stock_cantidad,
                'proveedorid' => $request->proveedor,
            ]);
            //return"logro actualizar sin achivo contenido";
            return redirect()->route('productos')->with('actualizar', 'ok');
        }
        return redirect()->route('productos')->with('actualizar', 'fallied');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Productos $producto)
    {

        //return $producto;
        $a = explode('/', $producto->imagen);
        //return count($a);
        if (count($a) == 6) {
            unlink('imgs/productos/' . $a[5] . '');
        } else {
            //return "cuando no haiga imagen";
        }
        //return $a;

        //eturn "se elimino laimg";
        $producto->delete();
        //return $prodcuto;
        return redirect()->route('productos')->with('eliminar', 'ok');
    }
}
