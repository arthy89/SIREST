<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Productos;
use App\Models\Categorias;
use App\Models\Proveedores;
use App\Models\Slider;
use Illuminate\Http\Request;

class EcommerceController extends Controller
{
    public function home(){
        $categorias = Categorias::all();
        $proveedores = Proveedores::all();
        $productos = Productos::all();
        $sliders = Slider::all();
        //return $sliders;
        return view('Frontend.home', compact('sliders'));
    }
}
