<?php

namespace App\Http\Controllers\frontend;

use App\Http\Requests\Frontend\ClientesEcom\ClientesEcomReq;
use App\Http\Controllers\Controller;
use App\Models\Persona;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;

class ClientesEcomController extends Controller
{
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
        return view('Frontend.Auth.registrar');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(ClientesEcomReq $request)
    {
        //return $request;
        $clientes = Persona::create([
            'nombres' => $request->nombres,
            'apellidos' => $request->apellidos,
            'identificacion' => $request->identificacion,
            'password' => Hash::make($request->password),
            'telefono' => $request->telefono,
            'email' => $request->email,
            'direccionfiscal' => $request->direccionfiscal
        ]);

        Auth::guard('client')->login($clientes);

        return redirect()->route('home-client')->with('crear', 'ok');
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
