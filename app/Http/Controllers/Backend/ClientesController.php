<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Persona;
use Illuminate\Http\Request;
use App\Http\Requests\Backend\Clientes\ClientesReq;
use App\Http\Requests\Backend\Clientes\ClientesUpReq;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Storage;
use Yajra\DataTables\DataTables;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use DB;

class ClientesController extends Controller
{
    public function __construct()
    {
        // only >< except
        $this->middleware('auth:web');
    }

    /**
     * Display a listing of the resource.
     */

    public function index(Request $request)
    {
        // en la vista principal
        if ($request->ajax()) {
            $personas = DB::table('persona')
                ->select('persona.idpersona', 'persona.nombres', 'persona.apellidos', 'persona.identificacion', 'persona.telefono', 'persona.email', 'persona.password', 'persona.direccionfiscal', 'persona.status')->get();
            return DataTables::of($personas)
                ->addIndexColumn()
                ->addColumn('action', function ($row) {
                    $ruta_editar =  route('editar_clientes', $row->idpersona);
                    $ruta_eliminar = route('eliminar_clientes', $row->idpersona);
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
                //    return $form;
                //})
                ->rawColumns(['action'])
                ->make(true);
        }

        //return $request->ajax();
        return view("Backend.Clientes.clientesindex");
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return view('Backend.Clientes.clientescrear');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(ClientesReq $request)
    {
        //return $request;
        $clientes = Persona::create([
            'nombres' => $request->nombre_cliente,
            'apellidos' => $request->apellido_cliente,
            'identificacion' => $request->identificacion_cliente,
            'password' => Hash::make($request->password_cliente),
            'telefono' => $request->telefono_cliente,
            'email' => $request->email_cliente,
            'direccionfiscal' => $request->direccionfiscal_cliente,
            'status' => $request->status,
        ]);

        return redirect()->route('clientes')->with('crear', 'ok');
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

    public function edit(Persona $cliente)
    {
        //return $producto;
        //$categorias = Categorias::all();
        // return $cliente;

        return view('Backend.Clientes.clienteseditar', compact('cliente'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(ClientesUpReq $request, Persona $cliente)
    {
        //return $request;
        //
        if ($request->password_cliente == null) {
            $cliente->update([
                'nombres' => $request->nombre_cliente,
                'apellidos' => $request->apellido_cliente,
                'identificacion' => $request->identificacion_cliente,
                'telefono' => $request->telefono_cliente,
                'email' => $request->email_cliente,
                'direccionfiscal' => $request->direccionfiscal_cliente,
                'status' => $request->status,
            ]);
        } else {
            $cliente->update([
                'nombres' => $request->nombre_cliente,
                'apellidos' => $request->apellido_cliente,
                'identificacion' => $request->identificacion_cliente,
                'password' => $request->password_cliente,
                'telefono' => $request->telefono_cliente,
                'email' => $request->email_cliente,
                'direccionfiscal' => $request->direccionfiscal_cliente,
                'status' => $request->status,
            ]);
        }


        return redirect()->route('clientes')->with('actualizar', 'ok');
    }

    /**
     * Remove the specified resource from storage.
     */

    public function destroy(Persona $cliente)
    {
        $cliente->delete();
        //return $categoria;
        return redirect()->route('clientes')->with('eliminar', 'ok');
    }
}
