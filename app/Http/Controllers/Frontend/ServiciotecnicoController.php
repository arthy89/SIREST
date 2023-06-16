<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Productos;
use App\Models\Categorias;
use App\Models\Proveedores;
use Yajra\DataTables\DataTables;
use DB;

class ServiciotecnicoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $repuestos = DB::table('producto')
                ->select('*')
                ->join('categoria', 'producto.categoriaid', '=', 'categoria.idcategoria')
                ->where(function ($query) {
                    $query->where('categoria.nombre', 'Pantallas')
                        ->orWhere('categoria.nombre', 'Flex Carga');
                })
                ->get();

        $productos = Productos::all();
        //return $repuestos;
        return view("Frontend.Serviciotecnico.serviciotecnicoindex", compact('productos','repuestos'));

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
