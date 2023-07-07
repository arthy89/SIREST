<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\Frontend\LoginRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;
use App\User;
use DB;

class LoginEController extends Controller
{
    public function login(Request $request)
    {
        // return $request;
        $remember = $request->filled('remember');

        if (Auth::guard('client')->attempt($request->only('email', 'password'), $remember)) {
            // $request->session()->regenerate();
            return redirect()->route('home-client')
                // ->intended('/')
                ->with('status', '¡Inicio de sesión exitoso!');
        }
    }

    public function logout(Request $request)
    {
        Auth::guard('client')->logout();

        // $request->session()->invalidate();
        // $request->session()->regenerateToken();

        return redirect()->route('login_cliente')->with('status', '¡Cierre de sesión exitoso!');
    }
}
