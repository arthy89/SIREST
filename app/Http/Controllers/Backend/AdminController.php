<?php

namespace App\Http\Controllers\Backend;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Promociones;
use App\Models\Ventas;
use App\Models\Usuarios;
use App\Models\Persona;
use App\Models\Pedido;
use App\Models\Productos;
class AdminController extends Controller
{
    public function __construct()
    {
        // only >< except
        $this->middleware('auth:web');
    }

    public function dashboard()
    {
        $total_dinero= 0;
        $suma_venta = Ventas::sum('total_venta');
        $total_usuarios = Usuarios::count();
        $total_clientes  = Persona::where('datecreated', '>=', DB::raw('DATE_SUB(CURDATE(), INTERVAL 7 DAY)'))
        ->count();
        $reparaciones_total =Pedido::count();
        $reparaciones_pendientes = Pedido::where('status', '!=',5)->count();
        $reparaciones_finalizados = Pedido::where('status', '=',5)->count();
        $reparaciones_recoger = Pedido::where('status', '=',1)->count();
        //$suma_venta  = DB::table('ventas')->sum('total_venta');


        return view('Backend.dashboard',compact('suma_venta','total_usuarios','reparaciones_recoger','total_clientes','reparaciones_total','reparaciones_pendientes','reparaciones_finalizados'));
    }
}
