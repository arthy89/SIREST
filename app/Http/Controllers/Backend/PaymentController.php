<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Productos;
use Illuminate\Http\Request;
use Transbank\Webpay\WebpayPlus;
use Transbank\Webpay\WebpayPlus\Transaction;

class PaymentController extends Controller
{
    public function create($product)
    {
        //return $product;
        $producto = Productos::find($product);
        $precio = floatval($producto->precio_venta_public);

        // dd($precio);
        // return $producto;
        $webpay = new WebpayPlus();
        $buyOrder = uniqid(); // Generar un ID único para la orden de compra
        $sessionId = session()->getId(); // Obtener el ID de la sesión actual
        $response = $webpay->transaction()->create($buyOrder, $sessionId, $precio, route('payment.confirm'));


        // Guardar el token de la transacción en la sesión
        session(['transactionToken' => $response->getToken()]);

        // Redirigir al usuario al formulario de pago
        return redirect($response->getUrl());
    }

    public function confirm(Request $request)
    {
        $webpay = new WebpayPlus();
        $response = $webpay->transaction()->commit($request->token);

        if ($response->isSuccessful()) {
            // Pago exitoso, realizar acciones adicionales si es necesario
            return "Pago exitoso. Transacción: " . $response->getBuyOrder();
        } else {
            // Pago fallido, manejar el error
            return "Pago fallido. Código de error: " . $response->getStatus();
        }
    }
}
