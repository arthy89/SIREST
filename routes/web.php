<?php

use App\Http\Controllers\Backend\AdminController;
use App\Http\Controllers\Backend\UsuariosController;
use App\Http\Controllers\Backend\PerfilController;
use App\Http\Controllers\Backend\LoginController;
use App\Http\Controllers\Backend\CategoriasController;
use App\Http\Controllers\Backend\ClientesController;
use App\Http\Controllers\Backend\NegocioController;
use App\Http\Controllers\Backend\Payment\OrderController;
use App\Http\Controllers\Backend\Payment\WebhooksController;
use App\Http\Controllers\Backend\ProveedorController;
use App\Http\Controllers\Backend\VentasController;
use App\Http\Controllers\Backend\ResumenventasController;
use App\Http\Controllers\Backend\ProductosController;
use App\Http\Controllers\Backend\ReparacionesController;
//slider
use App\Http\Controllers\Backend\SliderController;
//promciones
use App\Http\Controllers\Backend\PromocionesController;
// livewire
use App\Http\Livewire\Backend\DispositivoLive\Listar;
use App\Http\Livewire\Backend\ProveedorLive\Listarproveedor;

// frontend controller
use App\Http\Controllers\Frontend\EcommerceController;
//categorias
use App\Http\Controllers\Frontend\CategoriasVentaController;
//ofertas
use App\Http\Controllers\Frontend\OfertasController;
//contactanos
use App\Http\Controllers\Frontend\ContactanosController;
//servicio tecnico
use App\Http\Controllers\Frontend\ServiciotecnicoController;
//servicio tecnico
use App\Http\Controllers\Frontend\LoginEController;
//servicio tecnico
use App\Http\Controllers\Frontend\ClientesEcomController;
//servicio tecnico
use App\Http\Controllers\Frontend\CarritoController;
use App\Http\Controllers\WebpayController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
-- Route:: get Consultar
-- Route:: Post Guardar
-- Route:: Delete Eliminar
-- Route:: Put Actualizar
|
*/

Route::get('/', function () {
    return redirect()->route('home-client');
});

Route::get('/home', function () {
    return redirect()->route('login-admin');
});

// !BACKEND
Route::get('backend/dashboard', [AdminController::class, 'dashboard'])->name('dashboard')->middleware('auth');

// !NEGOCIO
Route::get('backend/negocio', [NegocioController::class, 'index'])->name('negocio');
Route::put('backend/negocio/{negocio}/editar', [NegocioController::class, 'update'])->name('negocio_edit');


//->middleware('guest')
Route::view('backend/login', 'Backend/Auth/login')->name('login-admin')->middleware('guest:web');
Route::post('backend/login', [App\Http\Controllers\Backend\LoginController::class, 'login']);
Route::post('backend/logout', [App\Http\Controllers\Backend\LoginController::class, 'logout'])->name('logout-admin');

// usuarios
Route::get('backend/usuarios', [UsuariosController::class, 'index'])->name('usuarios');
Route::get('backend/usuarios/crear', [UsuariosController::class, 'create'])->name('crear_usuarios');
Route::post('backend/usuarios/crear', [UsuariosController::class, 'store'])->name('crear_usuarios');
Route::get('backend/usuarios/{usuario}/editar', [UsuariosController::class, 'edit'])->name('editar_usuarios');
Route::put('backend/usuarios/{usuario}/editar', [UsuariosController::class, 'update'])->name('editar_usuarios');
// contraseñas
Route::get('backend/usuarios/{usuario}/editarpass', [UsuariosController::class, 'editpass'])->name('editar_usuarios_pass');
Route::put('backend/usuarios/{usuario}/editarpass', [UsuariosController::class, 'updatepass'])->name('editar_usuarios_pass');
// borrar
Route::delete('backend/usuarios/{usuario}/eliminar', [UsuariosController::class, 'destroy'])->name('eliminar_usuarios');

// Perfil
Route::get('backend/{usuario}/perfil', [PerfilController::class, 'edit'])->name('editar_perfil');
Route::put('backend/{usuario}/perfil', [PerfilController::class, 'update'])->name('editar_perfil');
Route::put('backend/{usuario}/perfil/pass', [PerfilController::class, 'updatepass'])->name('editar_perfil_pass');

//CLIENTES
Route::get('backend/clientes', [ClientesController::class, 'index'])->name('clientes');
Route::get('backend/clientes/crear', [ClientesController::class, 'create'])->name('crear_clientes');
Route::post('backend/clientes/crear', [ClientesController::class, 'store'])->name('crear_clientes');
Route::get('backend/clientes/{cliente}/editar', [ClientesController::class, 'edit'])->name('editar_clientes');
Route::put('backend/clientes/{cliente}/editar', [ClientesController::class, 'update'])->name('editar_clientes');
// borrar CATEGORIAS
Route::delete('backend/clientes/{cliente}/eliminar', [ClientesController::class, 'destroy'])->name('eliminar_clientes');


//PROVEDOR estamos pasando que  listarproveedor se comportara como mcontrolador
Route::middleware(['auth:Sanctum', 'verified'])->get('backend/proveedor', Listarproveedor::class)->name('proveedor');
Route::get('backend/proveedor', [ProveedorController::class, 'index'])->name('proveedor');
// borrar PROVEEDOR
Route::delete('backend/proveedor/{categoria}/eliminar', [ProveedorController::class, 'destroy'])->name('eliminar_proveedor');

//CATEGORIAS
Route::get('backend/categorias', [CategoriasController::class, 'index'])->name('categorias');
Route::get('backend/categorias/crear', [CategoriasController::class, 'create'])->name('crear_categorias');
Route::post('backend/categorias/crear', [CategoriasController::class, 'store'])->name('crear_categorias');
Route::get('backend/categorias/{categoria}/editar', [CategoriasController::class, 'edit'])->name('editar_categorias');
Route::put('backend/categorias/{categoria}/editar', [CategoriasController::class, 'update'])->name('editar_categorias');
// borrar CATEGORIAS
Route::delete('backend/categorias/{categoria}/eliminar', [CategoriasController::class, 'destroy'])->name('eliminar_categorias');

//Productos
Route::get('backend/productos', [ProductosController::class, 'index'])->name('productos');
Route::get('backend/productos/crear', [ProductosController::class, 'create'])->name('crear_productos');
Route::post('backend/productos/crear', [ProductosController::class, 'store'])->name('crear_productos');
Route::get('backend/productos/{producto}/editar', [ProductosController::class, 'edit'])->name('editar_productos');
Route::put('backend/productos/{producto}/editar', [ProductosController::class, 'update'])->name('editar_productos');
// borrar producto
//Route::delete('backend/productos/{categoria}/eliminar', [CategoriasController::class, 'destroy'])->name('eliminar_categorias');
Route::delete('backend/productos/{producto}/eliminar', [ProductosController::class, 'destroy'])->name('eliminar_productos');

//! Reparaciones
Route::get('backend/reparaciones', [ReparacionesController::class, 'index'])->name('reparaciones');
Route::get('backend/reparaciones/crear', [ReparacionesController::class, 'create'])->name('reparaciones_crear_view');
Route::post('backend/reparaciones/nuevo', [ReparacionesController::class, 'store'])->name('reparaciones_crear');
Route::get('backend/reparaciones/{reparacion}/ver', [ReparacionesController::class, 'show'])->name('reparaciones_ver');
Route::get('backend/reparaciones/{reparacion}/imprimir', [ReparacionesController::class, 'print'])->name('reparaciones_imprimir');
Route::get('backend/reparaciones/{reparacion}/pdf', [ReparacionesController::class, 'pdf'])->name('reparaciones_pdf');
Route::put('backend/reparaciones/{reparacion}/actualizar', [ReparacionesController::class, 'update'])->name('reparaciones_actualizar');
Route::delete('backend/reparaciones/{reparacion}/eliminar', [ReparacionesController::class, 'destroy'])->name('reparaciones_eliminar');

//VENTAS
Route::get('backend/ventas', [VentasController::class, 'index', 'index2'])->name('ventas');
Route::post('backend/ventas', [VentasController::class, 'store'])->name('ventas_crear');
//Route::get('backend/ventas', [VentasController::class, 'index2'])->name('ventas');
//Resumen de venta
Route::get('backend/resumenventas', [ResumenventasController::class, 'index'])->name('resumenventas');
////////////ecommerce
//slider
Route::get('backend/slider', [SliderController::class, 'index'])->name('slider');
Route::get('backend/slider/crear', [SliderController::class, 'create'])->name('crear_slider');
Route::post('backend/slider/crear', [SliderController::class, 'store'])->name('crear_slider');
Route::get('backend/slider/{slider}/editar', [SliderController::class, 'edit'])->name('editar_slider');
Route::put('backend/slider/{slider}/editar', [SliderController::class, 'update'])->name('editar_slider');

Route::delete('backend/slider/{slider}/eliminar', [SliderController::class, 'destroy'])->name('eliminar_slider');
//priomociones
Route::get('backend/promociones', [PromocionesController::class, 'index'])->name('promociones');
Route::get('backend/promociones/crear', [PromocionesController::class, 'create'])->name('crear_promociones');
Route::post('backend/promociones/crear', [PromocionesController::class, 'store'])->name('crear_promociones');
Route::get('backend/promociones/{promociones}/editar', [PromocionesController::class, 'edit'])->name('editar_promociones');
Route::put('backend/promociones/{promociones}/editar', [PromocionesController::class, 'update'])->name('editar_promociones');
Route::delete('backend/promociones/{promociones}/eliminar', [PromocionesController::class, 'destroy'])->name('eliminar_promociones');
//Route::get('backend/ecommerce', [VentasController::class, 'index', 'index2'])->name('ventas');


//notificaciones
Route::get('/notifi', function () {
    return view('notificaciones');
});
//errors
Route::get('/errors', function () {
    return view('Errors.404');
});
// Dispositivos
Route::get('/backend/dispositivos-listar', Listar::class)->name('dispositivos');
Route::post('backend/dispotivos/crear', [ReparacionesController::class, 'create_device'])->name('create_device');

// ?FRONTEND
Route::get('ecommerce/home', [EcommerceController::class, 'home'])->name('home-client');

Route::view('ecommerce/login', 'Frontend/Auth/login')->name('login_cliente');
// crear cleinte


//Route::view('ecommerce/regitrar', 'Frontend/Auth/registrar')->name('login-crear');
//Route::post('ecommerce/login', [LoginEController::class, 'login_cliente']);
Route::post('ecommerce/login', [LoginEController::class, 'login'])->name('login_cliente');
Route::post('ecommerce/logout', [LoginEController::class, 'logout'])->name('logout-client');
/////////////////////editar p[erfi;l] cliente
// Route::get('backend/clientes', [ClientesController::class, 'index'])->name('clientes');
Route::get('ecommerce/regitrar', [ClientesEcomController::class, 'create'])->name('login-crear');
Route::post('ecommerce/regitrar', [ClientesEcomController::class, 'store'])->name('crear_ecom_clientes');
Route::get('ecommerce/clientes/{cliente}/editar', [ClientesEcomController::class, 'edit'])->name('editar_perfil_cliente');
Route::put('ecommerce/clientes/{cliente}/editar', [ClientesEcomController::class, 'update'])->name('editar_perfil_cliente');
Route::put('ecommerce/clientes/{cliente}/editar', [ClientesEcomController::class, 'updatepass'])->name('editar_perfil_cliente_pass');

//Route::get('ecommerce/{cliente}/perfil', [PerfilclienteController::class, 'edit'])->name('editar_perfil_cliente');

//Route::view('ecommerce/logincli', 'Backend/Auth/login')->name('login_cliente');
///////MODULO categorias
//Route::get('ecommerce/{name}', [CategoriasVentaController::class, 'filtrocategorias'])->name('filtro_categorias');
Route::get('ecommerce/categorias', [CategoriasVentaController::class, 'index'])->name('ecomerce_categorias');
Route::get('ecommerce/detalle/{parametro1}', [CategoriasVentaController::class, 'detalles'])->name('detalles_producto');
Route::get('ecommerce/categorias/fitro/{name}', [CategoriasVentaController::class, 'filtrocategorias'])->name('filtro_categorias');
/////modulo ofertas
Route::get('ecommerce/ofertas', [OfertasController::class, 'index'])->name('ofertas');
Route::get('ecommerce/ofertas/{nombre}', [OfertasController::class, 'detalles'])->name('detalles_oferta');

//contactanos
Route::get('ecommerce/contactanos', [ContactanosController::class, 'index'])->name('contactanos');

//servicio tecnico
Route::get('ecommerce/serviciot', [ServiciotecnicoController::class, 'index'])->name('serviciotecnico');
Route::get('ecommerce/serviciot/detalle/{parametro1}', [ServiciotecnicoController::class, 'detalles'])->name('detalles_producto_tecnico');
//listado de pedidos de delivery reparacion
Route::get('ecommerce/serviciot/pedidos', [ServiciotecnicoController::class, 'list_pedidos_servicio'])->name('list_pedidos_servicio');

// !!WEBPAY
Route::get('ecommerce/serviciot/detalle/{parametro1}/webpay', [ServiciotecnicoController::class, 'wpconfirm'])->name('wp_confirm');
// Route::get('ecommerce/payment/create/{product}', [PaymentController::class, 'create'])->name('payment.create');
// Route::post('ecommerce/payment/confirm', [PaymentController::class, 'confirm'])->name('payment.confirm');

// Route::get('/webpay/init', [WebpayController::class, 'initTransaction']);
// Route::get('ecommerce/serviciot/detalle/{parametro1}/webpay', [WebpayController::class, 'initTransaction'])->name('webpay_init');

// ?MERCADOPAGO
Route::get('ecommerce/{pedido}/detalles', [OrderController::class, 'show'])->name('orders.show');
Route::post('ecommerce/mp/webhooks', WebhooksController::class);
Route::get('ecommerce/serviciot/detalle/{producto}/pay', [OrderController::class, 'pay'])->name('orders.pay');


/// carrito de compras
Route::get('ecommerce/carrito', [CarritoController::class, 'index'])->name('carrito_home');
