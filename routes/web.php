<?php

use App\Http\Controllers\Backend\AdminController;
use App\Http\Controllers\Backend\UsuariosController;
use App\Http\Controllers\Backend\PerfilController;
use App\Http\Controllers\Backend\LoginController;
use App\Http\Controllers\Backend\CategoriasController;
use App\Http\Controllers\Backend\ClientesController;
use App\Http\Controllers\Backend\ProveedorController;
use App\Http\Controllers\Backend\VentasController;
use App\Http\Controllers\Backend\ResumenventasController;
use App\Http\Controllers\Backend\ProductosController;
use App\Http\Controllers\Backend\ReparacionesController;
// livewire
use App\Http\Livewire\Backend\DispositivoLive\Listar;
use App\Http\Livewire\Backend\ProveedorLive\Listarproveedor;

// frontend controller
use App\Http\Controllers\Frontend\EcommerceController;
use App\Http\Controllers\Frontend\LoginEController;
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
    return view('welcome');
});

Route::get('/home', function () {
    redirect()->route('login-admin');
});

// !BACKEND
Route::get('backend/dashboard', [AdminController::class, 'dashboard'])->name('dashboard')->middleware('auth');



//->middleware('guest')
Route::view('backend/login', 'Backend/Auth/login')->name('login-admin')->middleware('guest');
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
Route::middleware(['auth:Sanctum','verified'])->get('backend/proveedor',Listarproveedor::class)->name('proveedor');
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

// Reparaciones
Route::get('backend/reparaciones', [ReparacionesController::class, 'index'])->name('reparaciones');
Route::get('backend/reparaciones/crear', [ReparacionesController::class, 'create'])->name('reparaciones_crear');

//VENTAS
Route::get('backend/ventas', [VentasController::class, 'index'])->name('ventas');
//Resumen de venta
Route::get('backend/resumenventas', [ResumenventasController::class, 'index'])->name('resumenventas');



//notificaciones
Route::get('/notifi', function () {
    return view('notificaciones');
});

// Dispositivos
Route::get('/backend/dispositivos-listar', Listar::class)->name('dispositivos');
Route::post('backend/dispotivos/crear', [ReparacionesController::class, 'create_device'])->name('create_device');
// ------------------------------------------------------------------------------------------------

// ?FRONTEND
Route::get('ecommerce/home', [EcommerceController::class, 'home'])->name('home-client');

Route::view('ecommerce/login', 'Frontend/Auth/login')->name('login-client');
Route::post('ecommerce/login', [LoginEController::class, 'login']);
Route::post('ecommerce/logout', [LoginEController::class, 'logout'])->name('logout-client');
Route::view('login', 'Backend/Auth/login')->name('login');
