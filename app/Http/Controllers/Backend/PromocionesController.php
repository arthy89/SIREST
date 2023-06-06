<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\Backend\Promociones\PromocionesRequest;
use App\Models\Productos;
use App\Models\Promociones;
use Yajra\DataTables\DataTables;
use DB;

class PromocionesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        //
        if ($request->ajax()) {
            $promociones = DB::table('promocion')
            ->join('producto', function ($join) {
                $join->on('promocion.idproducto', '=', 'producto.idproducto');
            })
                ->select('promocion.promocionid','promocion.nombre_promocion', 'promocion.fecha_inicio','promocion.fecha_final','producto.nombre_p', 'promocion.cantidad_descuento')->get();
            return DataTables::of($promociones)
                ->addIndexColumn()
                ->addColumn('action', function ($row) {
                    $ruta_editar =  route('editar_promociones', $row->promocionid);
                    $ruta_eliminar = route('eliminar_promociones', $row->promocionid);
                    $form = '<form action="' . $ruta_eliminar . '" method="POST" class="formulario">
                            ' . csrf_field() . '
                            ' . method_field("delete") . '
                            <a href="' . $ruta_editar . '" class="btn bg-gradient-info"><i class="material-icons">edit</i>EDITAR</a>
                            <button type="submit" class="btn bg-gradient-danger formulario"><i class="material-icons">delete</i>ELIMINAR</button>
                        </form>';
                    return $form;
                })
                //->addColumn('action', function($row){
                //    $form = '<a href="" class="btn bg-gradient-info"><i class="material-icons">edit</i> Editar</a>';

                //})
                ->rawColumns([ 'action'])
                ->make(true);
        }
        //return $form;
        return view("Backend.Promociones.promocionesindex");
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        $productos = Productos::all();
        //return $productos;
        return view("Backend.Promociones.promocionescrear",compact('productos'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(PromocionesRequest $request)
    {

        //return $request;

        $promocion = Promociones::create([
            'nombre_promocion' => $request->nombre_promocion,
            'fecha_inicio' => $request->fecha_inicio,
            'fecha_final' => $request->fecha_final,
            'idproducto' => $request->productoid,
            'tipo_descuento' => $request->tipo_descuento,
            'cantidad_descuento' => $request->cantidad_descuento
        ]);

        return redirect()->route('promociones')->with('crear', 'ok');
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
