<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Transbank\Webpay\Webpay;
use Transbank\Webpay\Configuration;

class WebpayController extends Controller
{
    public function initTransaction()
    {
        // Obtener las credenciales de .env
        $commerceCode = config('app.WEBPAY_COMMERCE_CODE');
        $apiKey = config('app.WEBPAY_API_KEY');
        $environment = config('app.WEBPAY_ENVIRONMENT');

        // Configurar la conexión a Webpay
        $configuration = new Configuration();
        $configuration->setCommerceCode($commerceCode);
        $configuration->setApiKey($apiKey);
        $configuration->setEnvironment($environment);

        // Crear instancia de Webpay
        $webpay = new Webpay($configuration);

        // Generar URL de pago
        $response = $webpay->getNormalTransaction()->initiate("Nombre del producto", 1000, "Orden123", "http://tudominio.cl/webpay/return");

        return view('Frontend.Serviciotecnico.serviciotecnicodetalle')->with([
            'url_tbk' => $response->getUrl(),
            'token' => $response->getToken(),
        ]);
    }
}
