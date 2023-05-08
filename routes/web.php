<?php

use App\Http\Controllers\Backend\AdminController;
use App\Http\Controllers\Backend\UsuariosController;
use App\Http\Controllers\Backend\PerfilController;
use App\Http\Controllers\Backend\LoginController;
use App\Http\Controllers\Backend\CategoriasController;
use App\Http\Controllers\Backend\ProductosController;
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


//CATEGORIAS
Route::get('backend/categorias', [CategoriasController::class, 'index'])->name('categorias');
Route::get('backend/categorias/crear', [CategoriasController::class, 'create'])->name('crear_categorias');
Route::post('backend/categorias/crear', [CategoriasController::class, 'store'])->name('crear_categorias');

//Productos
Route::get('backend/productos', [ProductosController::class, 'index'])->name('productos');
Route::get('backend/productos/crear', [ProductosController::class, 'create'])->name('crear_productos');
Route::post('backend/productos/crear', [ProductosController::class, 'store'])->name('crear_productos');


// ------------------------------------------------------------------------------------------------

// ?FRONTEND
Route::get('ecommerce/home', [EcommerceController::class, 'home'])->name('home-client');

Route::view('ecommerce/login', 'Frontend/Auth/login')->name('login-client');
Route::post('ecommerce/login', [LoginEController::class, 'login']);
Route::post('ecommerce/logout', [LoginEController::class, 'logout'])->name('logout-client');
Route::view('login', 'Backend/Auth/login')->name('login');
