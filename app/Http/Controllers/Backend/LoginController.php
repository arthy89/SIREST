<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\Backend\LoginRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;

class LoginController extends Controller
{
    public function login(Request $request)
    {
        return $request;
        $remember = $request->filled('remember');

        if (Auth::attempt($request->only('email', 'password'), $remember)) {

        }

        return redirect('login');
    }
}
