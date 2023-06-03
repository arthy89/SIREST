<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Productos;
use App\Models\Categorias;
use App\Models\Proveedores;
use Yajra\DataTables\DataTables;
use DB;

class OfertasController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $productos = Productos::all();
        //return $productos;
        return view("Frontend.Ofertas.ofertasindex", compact('productos'));

    }
    public function detalles(Request $request)
    {
        //
        //return $request;
        //$categorias = Categorias::all();
        $productos = Productos::all();
        // return $usuarios;
        return view('Frontend.Ofertas.ofertasdetalles', compact('productos'));
        //return view("Frontend.Categoriasventa.categoriasventaindex");
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
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
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
