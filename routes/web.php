<?php

use App\Http\Controllers\Backend\AdminController;
use App\Http\Controllers\Backend\LoginController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
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
