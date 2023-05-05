<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Categorias;
use Illuminate\Http\Request;
use App\Http\Requests\Backend\Categorias\CategoriasRequest;
use DB;

class CategoriasController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // en la vista principal
        $categorias = Categorias::all();
        // return $categorias;
        return view("Backend.Categorias.categoriasindex", compact('categorias'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return view('Backend.Categorias.categoriascrear');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CategoriasRequest $request)
    {
        // return $request;

        if ($request->hasFile('archivo')){
            $file = $request->file('archivo');
            $destinopath = 'imgs/categorias/';
            $filename = time() . '-' . $file->getClientOriginalName();
            $uploadSuccess = $request->file('archivo')->move($destinopath, $filename);
            $ruta = $destinopath . $filename;
        }

        $categoria = Categorias::create([
            'nombre' => $request->nombre_producto,
            'descripcion' => $request->descripcion,
            'ruta' => $ruta,
            'status' => $request->status,
        ]);

        return redirect()->route('categorias');
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
