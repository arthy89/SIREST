<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Categorias;
use Illuminate\Http\Request;
use App\Http\Requests\Backend\Categorias\CategoriasRequest;
use Illuminate\Support\Facades\Validator;
use Yajra\DataTables\DataTables;
use DB;

class CategoriasController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        // en la vista principal
        if($request->ajax()){
            $categorias = DB::table('categoria')
                    ->select('categoria.idcategoria','categoria.nombre','categoria.descripcion','categoria.ruta','categoria.status')->get();
            return DataTables::of($categorias)
            ->addIndexColumn()
            ->addColumn('img', function($categoria){
                $ruta = asset($categoria->ruta);
                $img = '<img src="'.$ruta.'" width="100px">';
                return $img;
            })
            ->addColumn('action', function($row){
                $ruta_editar =  route('editar_categorias', $row->idcategoria);
                $ruta_eliminar = route('eliminar_categorias', $row->idcategoria);
                $form = '<form action="'.$ruta_eliminar.'" method="POST" class="formulario">
                            '.csrf_field().'
                            '.method_field("delete").'
                            <a href="'.$ruta_editar.'" class="btn bg-gradient-info"><i class="material-icons">edit</i>EDITAR</a>
                            <button type="submit" class="btn bg-gradient-danger formulario"><i class="material-icons">delete</i>ELIMINAR</button>
                        </form>';
                return $form;
            })
            //->addColumn('action', function($row){
            //    $form = '<a href="" class="btn bg-gradient-info"><i class="material-icons">edit</i> Editar</a>';
            //    return $form;
            //})
            ->rawColumns(['img','action'])
            ->make(true);
        }

        return view("Backend.Categorias.categoriasindex");
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
            'nombre' => $request->nombre_categoria,
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

    public function edit(Categorias $categoria)
    {
        //return $producto;
        //$categorias = Categorias::all();

        return view('Backend.Categorias.categoriasedit', compact('categoria'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(CategoriasRequest $request, Categorias $categoria)
    {
        if($request->hasFile('archivo')){
            return "eres un ";
        }
        //return ;

        // if ($request->hasFile('archivo')){
        //     $file = $request->file('archivo');
        //     $destinopath = 'imgs/categorias/';
        //     $filename = time() . '-' . $file->getClientOriginalName();
        //     $uploadSuccess = $request->file('archivo')->move($destinopath, $filename);
        //     $ruta = $destinopath . $filename;
        // }

        // $categoria->update([
        //     'nombre' => $request->nombre_categoria,
        //     'descripcion' => $request->descripcion,
        //     'ruta' => $ruta,
        //     'status' => $request->status,
        // ]);

        //return redirect()->route('categorias')->with('status', 'Categoria actualizado correctamente!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
