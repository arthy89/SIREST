<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\Backend\UsuariosReq\UsuariosRequest;
use App\Http\Requests\Backend\UsuariosReq\EditUsuReq;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Hash;
use App\Models\Usuarios;
use App\Models\Rol;
use DB;

class UsuariosController extends Controller
{
    public function __construct()
    {
        // only >< except
        $this->middleware('auth:web');
    }

    public function index()
    {
        //
        $usuarios = DB::table('usuarios')
            ->join('rol', function ($join) {
                $join->on('usuarios.rolid', '=', 'rol.idrol');
            })
            ->select('usuarios.idusuarios', 'usuarios.nombre', 'usuarios.apellidos', 'usuarios.email', 'usuarios.status', 'rol.nombrerol')->get();
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
    public function store(UsuariosRequest $request)
    {
        // return $request;
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
    public function edit(Usuarios $usuario)
    {
        //
        // return $usuario;
        return view('Backend.Usuarios.editusuario', compact('usuario'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(EditUsuReq $request, Usuarios $usuario)
    {
        // return $request;
        $usuario->update([
            'nombre' => $request->nombre,
            'apellidos' => $request->apellidos,
            'email' => $request->email,
            'status' => $request->status,
            'rolid' => $request->rolid,
        ]);

        return redirect()->route('usuarios')->with('status', '¡Usuario actualizado correctamente!');
    }

    /**
     * Remove the specified resource from storage.
     */

    // para editar las contraseñas de otros usuarios
    public function editpass(Usuarios $usuario)
    {

        return view('Backend.Usuarios.editcontra', compact('usuario'));
    }

    public function updatepass(Request $request, Usuarios $usuario)
    {
        $usuario->update([
            'password' => Hash::make($request->password),
        ]);
        return redirect()->route('usuarios')->with('status-contra', '¡Contraseña del usuario actualizado correctamente!');
    }

    public function destroy(Usuarios $usuario)
    {
        //
        $usuario->delete();
        return redirect()->route('usuarios')->with('eliminar', 'ok');
    }
}
