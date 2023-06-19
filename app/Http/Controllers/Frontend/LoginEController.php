<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;
use App\Model\Persona;
use DB;

class LoginEController extends Controller
{

    public function login_cliente(Request $request)
    {
        //valicacion
        $credenciales = [
            "email" => $request->email,
            "password" => $request->password
        ];
        $remember = ($request->has('remmenber') ? true : false);
        if(Auth::attempt($credenciales, $remember)){
            $request->session()->regenerate();
            return redirect()->route('home-client')->with('status', '¡Inicio de sesión exitoso!');
        }else{
            return redirect()->route('login_cliente')->with('status', 'Error de sesión!');;
            //return redirect('login');
        }
    }

    public function logout_cliente(Request $request){
        //return $request;
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->token();

        // $request->session()->invalidate();
        // $request->session()->regenerateToken();

        return redirect()->route('home-client')->with('status','¡Cierre de sesión exitoso!');
    }
}
