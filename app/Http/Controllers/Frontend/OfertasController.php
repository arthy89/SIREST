<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Productos;
use Carbon\Carbon;
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
            $fechaActual = Carbon::now()->toDateString();

            $ofertas = Productos::join('promocion', 'producto.idproducto', '=', 'promocion.idproducto')
                ->select('producto.*', 'promocion.nombre_promocion', 'promocion.fecha_inicio', 'promocion.fecha_final', 'promocion.tipo_descuento', 'promocion.cantidad_descuento')
                ->where('promocion.fecha_inicio', '<=', $fechaActual)
                ->where('promocion.fecha_final', '>=', $fechaActual)
                ->paginate(8);


        $productos = Productos::all();
        //return $resultados;
        return view("Frontend.Ofertas.ofertasindex", compact('productos','ofertas'));

    }
    public function detalles(Request $request, $nombre)
    {
        //

        $product = Productos::join('promocion', 'producto.idproducto', '=', 'promocion.idproducto')
        ->select('producto.*', 'promocion.nombre_promocion', 'promocion.fecha_inicio', 'promocion.fecha_final', 'promocion.tipo_descuento', 'promocion.cantidad_descuento')
        ->where('producto.nombre_p', $nombre)
        ->first();
        $palabras = str_word_count($nombre, 1);
        //return $palabras[0];
        $productossim = Productos::where('nombre_p', 'LIKE', '%' . $palabras[0] . '%')->get();
        //return $productossim;
        //$categorias = Categorias::all();
        // $productossim = Productos::join('promocion', 'producto.idproducto', '=', 'promocion.idproducto')
        //         ->select('producto.*', 'promocion.nombre_promocion', 'promocion.fecha_inicio', 'promocion.fecha_final', 'promocion.tipo_descuento', 'promocion.cantidad_descuento')
        //         ->where('nombre_p', 'LIKE', '%' . $palabras[0] . '%')
        //         ->get();
        //return $product;
        return view('Frontend.Ofertas.ofertasdetalles', compact('product','productossim'));
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
