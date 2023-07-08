<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Slider;
use Yajra\DataTables\DataTables;
use DB;

class SliderController extends Controller
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

        $slider = Slider::all();
        //return $slider;

        return view("Backend.Slider.sliderindex", compact('slider'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return view("Backend.Slider.slidercrear");
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        //return $request;
        if ($request->hasFile('archivo')) {
            $file = $request->file('archivo');
            $destinopath = 'imgs/slider/';
            $filename = time() . '-' . $file->getClientOriginalName();
            $uploadSuccess = $request->file('archivo')->move($destinopath, $filename);
            $ruta = $destinopath . $filename;
        }
        $slider = Slider::create([
            'htmlcode' => $request->htmlcode,
            'imagen' => $ruta
        ]);

        return redirect()->route('slider')->with('crear', 'ok');
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
    public function edit(Slider $sliders, $sliderid)
    {
        $datos = Slider::find($sliderid);
        //return $datos;
        return view('Backend.Slider.slideredit', compact('datos'));
    }


    /**
     * Update the specified resource in storage.
     */

    public function update(Request $request, Slider $sliders, $id)
    {
        //return $id;
        // Validar los datos del formulario (opcional)


        // Obtener el registro a actualizar
        $registro = Slider::find($id);

        // Actualizar los campos con los valores del formulario
        $registro->htmlcode = $request->input('htmlcode');
        //return $request;
        // Otros campos a actualizar

        // Guardar los cambios en la base de datos


        //si conotiene archivo
        if ($request->hasFile('archivo')) {

            //eliminamos la imagen que tenia antes

            unlink($registro->imagen);

            //unlink('imgs/categorias/'.$a[5].'');
            $file = $request->file('archivo');
            $destinopath = 'imgs/slider/';
            $filename = time() . '-' . $file->getClientOriginalName();
            $uploadSuccess = $request->file('archivo')->move($destinopath, $filename);
            $ruta = $destinopath . $filename;
            //actualizamos los contenidos
            $registro->htmlcode = $request->input('htmlcode');
            $registro->imagen = $ruta;
            $registro->save();

            //return"logro actualizar con achivo contenido";
            return redirect()->route('slider')->with('actualizar', 'ok');
            //si no contiener archivo no sobreponemos las imganes
        } else {

            $registro->htmlcode = $request->input('htmlcode');
            $registro->save();
            //return "No contiene un archivo";
            //return $request;
            //return"logro actualizar sin achivo contenido";
            return redirect()->route('slider')->with('actualizar', 'ok');
        }


        return redirect()->route('slider')->with('status', 'Slider actualizado correctamente!');
    }
    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        //return "se elimino la cosa";
        //
        // Buscar el producto por su ID
        $slider = Slider::find($id);
        unlink($slider->imagen);
        //return $slider;
        // Verificar si el producto existe
        if (!$slider) {
            return redirect()->back()->with('eliminar', 'ok_e');
        }

        // Eliminar el producto
        $slider->delete();

        // Redirigir a alguna vista o realizar alguna acción después de la eliminación
        return redirect()->back()->with('eliminar', 'ok');
    }
}
