<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Usuarios;
use Illuminate\Http\Request;
use App\Http\Requests\Backend\Perfil\PerfilRequest;
use Illuminate\Support\Facades\Hash;

class PerfilController extends Controller
{
    public function __construct()
    {
        // only >< except
        $this->middleware('auth:web');
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
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
    public function edit(Usuarios $usuario)
    {
        //
        // return auth()->user();
        return view('Backend.Usuarios.perfil');
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(PerfilRequest $request, Usuarios $usuario)
    {
        $usuario->update([
            'nombre' => $request->nombre,
            'apellidos' => $request->apellidos,
            'email' => $request->email,
        ]);
        return redirect()->route('editar_perfil', auth()->user()->idusuarios)->with('status', '¡Datos Pesonales Actualizados Correctamente!');
    }

    public function updatepass(Request $request, Usuarios $usuario)
    {
        $usuario->update([
            'password' => Hash::make($request->password)
        ]);
        return redirect()->route('editar_perfil', auth()->user()->idusuarios)->with('contrastatus', '¡Contraseña Actualizada Correctamente!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
