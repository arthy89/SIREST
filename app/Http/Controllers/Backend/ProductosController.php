<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Productos;
use App\Models\Categorias;
use DB;

class ProductosController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $productos = Productos::all();
        return view("Backend.Productos.productosindex", compact('productos'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        $categorias = Categorias::all();
        //return $categorias;

        return view('Backend.Productos.productoscrear', compact('categorias'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        if ($request->hasFile('archivo')){
            $file = $request->file('archivo');
            $destinopath = 'imgs/productos/';
            $filename = time() . '-' . $file->getClientOriginalName();
            $uploadSuccess = $request->file('archivo')->move($destinopath, $filename);
            $ruta = $destinopath . $filename;
        }
        $producto = Productos::create([
            'categoriaid' => $request->categoriaid,
            'nombre' => $request->nombre_producto,
            'descripcion' => $request->descripcion,
            'precio_compra' => $request->precio_compra,
            'precio_venta_mayor' => $request->precio_mayoreo,
            'precio_venta_public' => $request->precio_publico,
            'colores' => $request->colores,
            'tags' => $request->tags,
            'stock' => $request->stock_cantidad,
            'imagen' => $ruta,
            'status' => $request->status
        ]);

        return redirect()->route('productos');
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
