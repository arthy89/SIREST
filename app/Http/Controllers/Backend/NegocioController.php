<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Http\Requests\Backend\Negocio\NegocioRequest;
use App\Models\Negocio;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class NegocioController extends Controller
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
        $paises = array(
            [
                "cod" => "Argentina",
                "pais" => "Argentina",
            ],
            [
                "cod" => "Bolivia",
                "pais" => "Bolivia",
            ],
            [
                "cod" => "Brasil",
                "pais" => "Brasil",
            ],
            [
                "cod" => "Chile",
                "pais" => "Chile",
            ],
            [
                "cod" => "Colombia",
                "pais" => "Colombia",
            ],
            [
                "cod" => "Ecuador",
                "pais" => "Ecuador",
            ],
            [
                "cod" => "Paraguay",
                "pais" => "Paraguay",
            ],
            [
                "cod" => "Perú",
                "pais" => "Perú",
            ],
            [
                "cod" => "Uruguay",
                "pais" => "Uruguay",
            ],
            [
                "cod" => "Venezuela",
                "pais" => "Venezuela",
            ],
        );
        $paises_json = json_encode($paises);
        $paises = json_decode($paises_json, false);
        $negocio = Negocio::all();
        return view('Backend.Negocio.negocioedit', compact('negocio', 'paises'));
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
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(NegocioRequest $request, Negocio $negocio)
    {
        // dd($request->neg_img);
        // return $request;
        // return $negocio;

        $imagen = $request->file('neg_img');

        if ($imagen) {
            Storage::disk('public')->delete($negocio->neg_img);
            $filename = time() . '-' . $imagen->getClientOriginalName();
            $path = $imagen->storeAs('negocio', $filename, 'public');

            $negocio->update([
                'neg_nombre' => $request->neg_nombre,
                'neg_pais' => $request->neg_pais,
                'neg_direccion' => $request->neg_direccion,
                'neg_cod' => $request->neg_cod,
                'neg_telefono' => $request->neg_telefono,
                'neg_correo' => $request->neg_correo,
                'neg_garantia' => $request->neg_garantia,
                'neg_img' => $path,
            ]);
        } else {
            $negocio->update([
                'neg_nombre' => $request->neg_nombre,
                'neg_pais' => $request->neg_pais,
                'neg_direccion' => $request->neg_direccion,
                'neg_cod' => $request->neg_cod,
                'neg_telefono' => $request->neg_telefono,
                'neg_correo' => $request->neg_correo,
                'neg_garantia' => $request->neg_garantia,
            ]);
        }

        return back();
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
