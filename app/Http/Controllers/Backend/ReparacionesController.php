<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Pedido;
use App\Models\Dispositivo;
use DB;

class ReparacionesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        return view('Backend.Reparaciones.reparacionesindex');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create_device(Request $request)
    {
        //
        // return $request;
        $dispositivo = Dispositivo::create([
            'device_name' => $request->device_name,
            'device_mark' => $request->device_mark
        ]);
        return back();
    }

    public function create()
    {
        //
        $dispositivos = Dispositivo::all();
        return view('Backend.Reparaciones.reparacionescrear', compact('dispositivos'));
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
