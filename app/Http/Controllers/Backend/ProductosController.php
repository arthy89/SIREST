<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Productos;
use App\Models\Categorias;
use Yajra\DataTables\DataTables;
use DB;

class ProductosController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index( Request $request)
    {
        //
        if($request->ajax()){
            $productos = DB::table('producto')
                    ->join('categoria', function($join){
                        $join->on('producto.categoriaid','=','categoria.idcategoria');
                    })
                    ->select('producto.nombre_p','producto.idproducto','producto.colores','categoria.nombre','producto.precio_compra','producto.stock','producto.imagen','producto.status')->get();
            return DataTables::of($productos)
            ->addIndexColumn()
            ->addColumn('colores', function($producto){
                $colos = $producto->colores;
                $datos = explode(',',$colos);
                $contador = 0;
                $textog = "";
                $textob = "<div class='cuadrado' style='width: 30px; height: 30px; background:white; border:1px solid #000; '></div>";
                $textor = "<div class='cuadrado' style='width: 30px; height: 30px; background:red; border:1px solid #000; '></div>";
                $textoa = "<div class='cuadrado' style='width: 30px; height: 30px; background:DarkBlue; border:1px solid #000; '></div>";
                $texton = "<div class='cuadrado' style='width: 30px; height: 30px; background:black; border:1px solid #000; '></div>";
                $textop = "<div class='cuadrado' style='width: 30px; height: 30px; background:DarkGray; border:1px solid #000; '></div>";

                    //(blanco,rojo,azul)
                foreach($datos as $elemento)
                    {
                        if($elemento == "blanco"){
                            $textog = $textog.$textob ;
                        }elseif($elemento == "rojo"){
                            $textog = $textog.$textor;
                        }elseif($elemento == "azul"){
                            $textog = $textog.$textoa;
                        }elseif($elemento == "negro"){
                            $textog = $textog.$texton;
                        }elseif($elemento == "plomo"){
                            $textog = $textog.$textop;
                        }
                    }
                return $textog;

            })
            ->addColumn('img', function($producto){
                $ruta = asset($producto->imagen);
                $img = '<img src="'.$ruta.'" width="100px">';
                return $img;
            })
            ->addColumn('action', function($row){
                $ruta_editar =  route('editar_productos', $row->idproducto);
                $ruta_eliminar = route('eliminar_productos', $row->idproducto);
                $form = '<form action="'.$ruta_eliminar.'" method="POST" class="formulario">
                            '.csrf_field().'
                            '.method_field("delete").'
                            <a href="'.$ruta_editar.'" class="btn bg-gradient-info"><i class="material-icons">edit</i>EDITAR</a>
                            <button type="submit" class="btn bg-gradient-danger formulario"><i class="material-icons">delete</i>ELIMINAR</button>
                        </form>';
                return $form;
            })
            //->addColumn('action', function($row){
            //    $form = '<a href="" class="btn bg-gradient-info"><i class="material-icons">edit</i> Editar</a>';
            //    return $form;
            //})
            ->rawColumns(['colores','img','action'])
            ->make(true);
        }

        return view("Backend.Productos.productosindex");
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        $categorias = Categorias::all();
        //return $categorias;

        return view('Backend.Productos.productoscrear', compact('categorias'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        //return $request;

        if ($request->hasFile('archivo')){
            $file = $request->file('archivo');
            $destinopath = 'imgs/productos/';
            $filename = time() . '-' . $file->getClientOriginalName();
            $uploadSuccess = $request->file('archivo')->move($destinopath, $filename);
            $ruta = $destinopath . $filename;
        }
        $producto = Productos::create([
            'categoriaid' => $request->categoriaid,
            'nombre_p' => $request->nombre_producto,
            'descripcion' => $request->descripcion,
            'precio_compra' => $request->precio_compra,
            'precio_venta_mayor' => $request->precio_mayoreo,
            'precio_venta_public' => $request->precio_publico,
            //'colores' => json_encode($request->colores),
            'colores' => implode(',',$request->colores),
            'tags' => json_encode($request->tags),
            'stock' => $request->stock_cantidad,
            'imagen' => $ruta,
            'status' => $request->status
        ]);

        return redirect()->route('productos');
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
    public function edit(Productos $producto)
    {

        $categorias = Categorias::all();
        //return $producto;
        return view('Backend.Productos.productosedit', compact('categorias','producto'));
    }


    /**
     * Update the specified resource in storage.
     */
    public function update(EditProdReq $request, Productos $producto)
    {
        //
         // return $request;
        $producto->update([

            'status' => $request->status,
            'rolid' => $request->rolid,
        ]);

        return redirect()->route('producto')->with('status', 'Producto actualizado correctamente!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
