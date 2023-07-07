<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Http\Requests\Backend\Reparacion\ReparacionRequest;
use Illuminate\Http\Request;
use App\Models\Pedido;
use App\Models\Dispositivo;
use App\Models\Imagenes;
use App\Models\Negocio;
use App\Models\Productos;
use App\Models\Persona;
use App\Models\Usuarios;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\UploadedFile;
use League\Flysystem\Visibility;
use Barryvdh\DomPDF\Facade\Pdf as PDF;

class ReparacionesController extends Controller
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
        // return Pedido::all();
        $pedidos = Pedido::join('persona', 'pedido.personaid', '=', 'persona.idpersona')
            ->leftJoin('usuarios', 'pedido.usuarioid', '=', 'usuarios.idusuarios')
            ->join('dispositivo', 'pedido.id_device', '=', 'dispositivo.id_device')
            ->select('pedido.*', 'pedido.status as estado_p', 'persona.*', 'persona.apellidos as persona_apellidos', 'usuarios.*', 'usuarios.apellidos as usuario_apellidos', 'usuarios.email as usuario_email', 'dispositivo.*')
            ->paginate(5);
        // ->get();
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
        if ($request->responsable) {
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
                'status' => 2,
            ]);
        } else {
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
                'status' => 0,
            ]);
        }

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
            }
        }

        if ($request->lista_pedido) {
            $listaPedido = json_decode($request->lista_pedido, true);

            foreach ($listaPedido as $item) {
                if ($item['tipo'] == 'producto' && isset($item['id_p']) && isset($item['cantidad'])) {
                    $producto = Productos::find($item['id_p']);
                    if ($producto) {
                        $cantidad = intval($item['cantidad']);
                        $producto->stock -= $cantidad;
                        $producto->save();
                    }
                }
            }
        }


        return redirect()->route('reparaciones')->with('creado', 'La reparación se registró correctamente');
    }

    /**
     * Display the specified resource.
     */
    public function show(Pedido $reparacion)
    {
        // return $reparacion;
        $dispositivos = Dispositivo::all();
        $usuarios = Usuarios::all();
        $rep_actual = Pedido::join('persona', 'pedido.personaid', '=', 'persona.idpersona')
            ->leftJoin('usuarios', 'pedido.usuarioid', '=', 'usuarios.idusuarios')
            ->join('dispositivo', 'pedido.id_device', '=', 'dispositivo.id_device')
            ->where('pedido.idpedido', $reparacion->idpedido)
            ->select('pedido.*', 'persona.*', 'persona.apellidos as persona_apellidos', 'usuarios.*', 'usuarios.apellidos as usuario_apellidos', 'usuarios.email as usuario_email', 'dispositivo.*')
            ->get();
        // return $rep_actual;
        $imagenes = Imagenes::where('idpedido', $reparacion->idpedido)->get();
        // return $imagenes;
        return view('Backend.Reparaciones.reparacionesver', compact('rep_actual', 'usuarios', 'dispositivos', 'imagenes'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    public function buscar()
    {
        //
        return view('Backend.Reparaciones.reparacionesbuscar');
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(ReparacionRequest $request, Pedido $reparacion)
    {
        // return $reparacion;
        // return $request;
        // * Actualizar campos
        $reparacion->update([
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
        // * Actualizar campos

        //! Eliminar imagenes
        if ($request->imagenes_eliminadas) {
            $images = $request->imagenes_eliminadas;
            $imageIds = json_decode(
                $images,
                true
            );
        }

        if (!empty($imageIds)) {
            $imagenes = Imagenes::whereIn('id', $imageIds)->get();

            foreach ($imagenes as $imagen) {
                // Elimina la imagen de la base de datos
                $imagen->delete();

                // Elimina el archivo de la imagen del sistema de archivos
                Storage::disk('public')->delete($imagen->ruta);
            }
        }
        //! Eliminar imagenes


        // ? Actualizar imagenes / resubir
        $imagenes_upt = $request->file('imagen');

        if ($imagenes_upt) {
            foreach ($imagenes_upt as $imagen) {
                $filename = time() . '-' . $imagen->getClientOriginalName();
                $path = $imagen->storeAs('reparaciones', $filename, 'public');

                $nuevaImagen = new Imagenes([
                    // 'idpedido' => $reparacion->idpedido,
                    'img' => $filename,
                    'ruta' => $path,
                ]);

                $reparacion->imagenes()->save($nuevaImagen);
            }
        }
        // ? Actualizar imagenes / resubir

        return redirect()->route('reparaciones')->with('actualizado', 'La reparación se actualizó correctamente');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Pedido $reparacion)
    {
        $imagenes = Imagenes::where('idpedido', $reparacion->idpedido)->get();

        // Eliminar las imágenes del sistema de archivos
        foreach ($imagenes as $imagen) {
            Storage::disk('public')->delete($imagen->ruta);
        }

        // Eliminar las imágenes de la base de datos
        $imagenes->each->delete();

        // Eliminar el pedido
        $reparacion->delete();

        return back();
    }

    public function print(Pedido $reparacion)
    {
        // return $reparacion;
        $negocio = Negocio::all();
        // return $negocio;

        $rep_actual = Pedido::join('persona', 'pedido.personaid', '=', 'persona.idpersona')
            ->leftJoin('usuarios', 'pedido.usuarioid', '=', 'usuarios.idusuarios')
            ->join('dispositivo', 'pedido.id_device', '=', 'dispositivo.id_device')
            ->where('pedido.idpedido', $reparacion->idpedido)
            ->select('pedido.*', 'persona.*', 'persona.apellidos as persona_apellidos', 'persona.telefono as persona_telefono', 'usuarios.*', 'usuarios.apellidos as usuario_apellidos', 'usuarios.email as usuario_email', 'dispositivo.*')
            ->get();
        // return $rep_actual;
        return view('Backend.Reparaciones.reparacionesprint', compact('rep_actual', 'negocio'));
    }

    public function pdf(Pedido $reparacion)
    {
        // return $reparacion;
        $negocio = Negocio::all();
        // return $negocio;

        $rep_actual = Pedido::join('persona', 'pedido.personaid', '=', 'persona.idpersona')
            ->leftJoin('usuarios', 'pedido.usuarioid', '=', 'usuarios.idusuarios')
            ->join('dispositivo', 'pedido.id_device', '=', 'dispositivo.id_device')
            ->where('pedido.idpedido', $reparacion->idpedido)
            ->select('pedido.*', 'persona.*', 'persona.apellidos as persona_apellidos', 'persona.telefono as persona_telefono', 'usuarios.*', 'usuarios.apellidos as usuario_apellidos', 'usuarios.email as usuario_email', 'dispositivo.*')
            ->get();
        // return $rep_actual;
        // return view('Backend.Reparaciones.reparacionesprint', compact('rep_actual', 'negocio'));

        $pdf = PDF::loadView('Backend.Reparaciones.reparacionespdf', compact('rep_actual', 'negocio'));

        return $pdf->stream("Factura.pdf", ["Attachment" => true]);
    }
}
