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
        $ofertas = DB::table('producto')
                    ->select('producto.*', 'promocion.*')
                    ->join('promocion', 'producto.idproducto', '=', 'promocion.idproducto')
                    ->get();
        $productos = Productos::all();
        //return $ofertas;
        return view("Frontend.Ofertas.ofertasindex", compact('productos','ofertas'));

    }
    public function detalles(Request $request, $nombre)
    {
        //

        $product = Productos::where('nombre_p', $nombre)->get();
        $palabras = str_word_count($nombre, 1);
        //return $palabras[0];
        $productossim = Productos::where('nombre_p', 'LIKE', '%' . $palabras[0] . '%')->get();
        //return $productosimilares;
        //$categorias = Categorias::all();
        $productos = Productos::all();
        // return $usuarios;
        return view('Frontend.Categoriasventa.categoriadetalles', compact('product','productossim'));
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
