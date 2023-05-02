<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\Backend\UsuariosRequest;
use Illuminate\Support\Facades\Hash;
use App\Models\Usuarios;
use App\Models\Rol;
use DB;

class UsuariosController extends Controller
{
    public function __construct()
    {
        // only >< except
        $this->middleware('auth', ['only' => ['index','create']]);
    }

    public function index()
    {
        //
        $usuarios = DB::table('usuarios')
                    ->join('rol', function($join){
                        $join->on('usuarios.rolid', '=', 'rol.idrol');
                    })
                    ->select('usuarios.idusuarios','usuarios.nombre','usuarios.apellidos','usuarios.email','rol.nombrerol')->get();
        // return $usuarios;
        return view('Backend.Usuarios.indexusu', compact('usuarios'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return view('Backend.Usuarios.crear');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //return $request;
        $user = Usuarios::create([
            'nombre' => $request->nombre,
            'apellidos' => $request->apellidos,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'rolid' => $request->rolid,
        ]);
        return redirect()->route('usuarios');
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
