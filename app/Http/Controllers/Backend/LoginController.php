<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\Backend\LoginRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;
use App\User;

class LoginController extends Controller
{
    public function login(Request $request)
    {
        // return $request;
        $remember = $request->filled('remember');

        if (Auth::guard('web')->attempt($request->only('email', 'password'), $remember) && Auth::user()->status == 0) {
            Auth::guard('web')->logout();
            return redirect()->route('login-admin')->with('inactivo', '¡Su perfil está inactivo!');
        }

        if (Auth::guard('web')->attempt($request->only('email', 'password'), $remember) && Auth::user()->status == 1) {
            // $request->session()->regenerate();
            return redirect()->route('dashboard')
                // ->intended('/')
                ->with('status', '¡Inicio de sesión exitoso!');
        }

        throw ValidationException::withMessages([
            'email' => ('invalid'),
        ]);
    }

    public function logout(Request $request)
    {

        Auth::guard('web')->logout();

        // $request->session()->invalidate();
        // $request->session()->regenerateToken();

        return redirect()->route('login-admin')->with('status', '¡Cierre de sesión exitoso!');
    }
}
