<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Http\Requests\Backend\Reparacion\ReparacionRequest;
use Illuminate\Http\Request;
use App\Models\Pedido;
use App\Models\Dispositivo;
use App\Models\Imagenes;
use App\Models\Persona;
use App\Models\Usuarios;
use DB;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\UploadedFile;
use League\Flysystem\Visibility;

class ReparacionesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $pedidos = Pedido::join('persona', 'pedido.personaid', '=', 'persona.idpersona')
            ->join('usuarios', 'pedido.usuarioid', '=', 'usuarios.idusuarios')
            ->join('dispositivo', 'pedido.id_device', '=', 'dispositivo.id_device')
            ->select('pedido.*', 'persona.*', 'persona.apellidos as persona_apellidos', 'usuarios.*', 'usuarios.apellidos as usuario_apellidos', 'usuarios.email as usuario_email', 'dispositivo.*')
            ->get();
        // return $pedidos;
        return view('Backend.Reparaciones.reparacionesindex', compact('pedidos'));
    }

    /**
     * Show the form for creating a new resource.
     */

    public function create()
    {
        //
        // $pedido = Pedido::all();
        // return $pedido;
        $dispositivos = Dispositivo::all();
        $usuarios = Usuarios::all();
        return view('Backend.Reparaciones.reparacionescrear', compact('dispositivos', 'usuarios'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(ReparacionRequest $request)
    {
        // return $request;

        $pedido = Pedido::create([
            'personaid' => $request->cliente,
            'usuarioid' => $request->responsable,
            'fecha' => now(),
            'fecha_entrega' => $request->fecha_entrega,
            'monto' => $request->monto,
            'impuesto' => $request->impuesto,
            'adelanto' => $request->adelanto,
            'costo_envio' => $request->envio,
            'id_device' => $request->dispositivo,
            'imei' => $request->imei,
            'contrasena' => $request->contra,
            'patron' => $request->patron,
            'lista_pedido' => $request->lista_pedido,
            'prioridad' => $request->prioridad,
            'descripcion' => $request->descripcion,
        ]);

        $imagenes = $request->file('imagen');
        if ($imagenes) {
            foreach ($imagenes as $imagen) {
                $filename = time() . '-' . $imagen->getClientOriginalName();
                $path = $imagen->storeAs('reparaciones', $filename, 'public');

                $nuevaImagen = new Imagenes([
                    'img' => $filename,
                    'ruta' => $path,
                ]);

                $pedido->imagenes()->save($nuevaImagen);

                // $nuevaImagen->save();
            }
        }

        return redirect()->route('reparaciones');
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
