<?php

namespace App\Http\Controllers\Backend\Payment;

use App\Http\Controllers\Controller;
use App\Models\Dispositivo;
use App\Models\Pedido;
use App\Models\Productos;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Http;

class OrderController extends Controller
{
    //
    public function show(Pedido $pedido)
    {
        $user = auth()->guard('client')->user();
        if ($pedido->personaid == $user->idpersona) {
            $dispositivo = Dispositivo::find($pedido->id_device);
            $lista_pedido_array = json_decode($pedido->lista_pedido, true);
            $id_producto = $lista_pedido_array[1]['id_p'];
            $producto = Productos::find($id_producto);
            return view('Frontend.Ordenes.ordermpshow', compact('pedido', 'dispositivo', 'producto', 'lista_pedido_array'));
        }
    }

    public function pay(Productos $producto, Request $request)
    {
        $payment_id = $request->get('payment_id');

        $response = Http::get("https://api.mercadopago.com/v1/payments/$payment_id" . "?access_token=APP_USR-748270490231123-062723-662fa2d30f4970667e3b1ce56ab93a9c-1409714400");

        $response = json_decode($response);

        $status = $response->status;

        $servicio = array("id" => 1, "tipo" => "servicio", "nombre" => "Cambio de pantalla", "cantidad" => null, "precio" => 0);

        $producto_l = array("id" => 2, "id_p" => $producto->idproducto, "tipo" => "producto", "nombre" => $producto->nombre_p, "cantidad" => 1, "precio" => $response->transaction_amount - 20);

        $lista = array(0 => $servicio, 1 => $producto_l);

        $lista_pedido = json_encode($lista);
        // usuario
        $user = auth()->guard('client')->user();

        if ($status == 'approved') {
            $pedido = Pedido::create([
                'personaid' => $user->idpersona,
                'fecha' => now(),
                'monto' => $response->transaction_amount - 20,
                'costo_envio' => 20,
                'id_device' => $producto->id_device,
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
        }

        return redirect()->route('orders.show', $pedido->idpedido);
    }
}
