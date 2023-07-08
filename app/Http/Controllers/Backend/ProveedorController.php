<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Storage;
use Yajra\DataTables\DataTables;
use App\Models\Proveedores;
use Illuminate\Support\Str;
use DB;

class ProveedorController extends Controller
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
        //return $request;
        //return view('livewire.backend.proveedorlive.listarproveedor', compact('proveedores'));
        return view("Backend.Proveedor.proveedorindex");
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return view('Backend.Proveedor.proveedorcrear');
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
