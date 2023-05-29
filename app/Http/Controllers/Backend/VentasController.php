<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;

use App\Models\Productos;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;
use DB;

class VentasController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {


        //return view("Backend.Ventas.ventasindex");
        if($request->ajax()){
            $productos = DB::table('producto')
                        ->select('producto.idproducto','producto.nombre_p','producto.stock','producto.precio_venta_public')->get();
            //->select('producto.idproducto','producto.nombre_p','producto.stock','producto.precio_venta_public')->orderBy('producto.idproducto','desc')->take()->get();
            return DataTables::of($productos)
            ->addIndexColumn()
            ->addColumn('action', function($row){

                $value = '<a href="javascript:;" onclick()
                            class="avatar avatar-sm border-1 rounded-circle bg-white shadow-sm">
                            <i class="material-icons text-dark text-xxxl">add</i>
                        </a>';
                return $value;
            })
            //->addColumn('action', function($row){
            //    $form = '<a href="" class="btn bg-gradient-info"><i class="material-icons">edit</i> Editar</a>';
            //    return $form;
            //})
            ->rawColumns(['action'])
            ->make(true);
        }
        //return $request;
        //return view("Backend.Categorias.categoriasindex");
        return view("Backend.Ventas.ventasindex");
    }
    public function index2(Request $request)
    {
        if($request->ajax()){
            $productos = DB::table('producto')
                    ->select('producto.idproducto','producto.nombre_p','producto.stock','producto.precio_venta_public')->get();
            return DataTables::of($productos)
            ->addIndexColumn()
            ->addColumn('action', function($row){

                $value = '<a href="javascript:;" onclick()
                            class="avatar avatar-sm border-1 rounded-circle bg-white shadow-sm">
                            <i class="material-icons text-dark text-xxxl">add</i>
                        </a>';
                return $value;
            })
            ->rawColumns(['action'])
            ->make(true);
        }
        return view("Backend.Ventas.ventasindex");
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
        return $request;
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
