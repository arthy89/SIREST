<?php

use App\Http\Controllers\Backend\AdminController;
use App\Http\Controllers\Backend\LoginController;
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

Route::prefix('backend')->group(function(){
    Route::get('dashboard', [AdminController::class, 'dashboard']);
});
//->middleware('guest')
Route::view('login', 'Backend/Auth/login')->name('login');

Route::post('login', [App\Http\Controllers\Backend\LoginController::class, 'login']);

Route::post('logout', [App\Http\Controllers\Backend\LoginController::class, 'logout'])->name('logout');
