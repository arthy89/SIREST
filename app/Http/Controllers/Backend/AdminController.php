<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AdminController extends Controller
{

    // public function __construct()
    // {
    //     // only >< except
    //     $this->middleware('auth', ['only' => ['']]);
    // }

    public function dashboard()
    {
        return view('Backend.dashboard');
    }
}
