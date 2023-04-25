<?php

use App\Http\Controllers\Backend\AdminController;
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

/*
mis pruewbas
*/
Route::get('section', Function () {
    //consulta a la bd
    $posts  =  [
        [ 'id' => 1, 'title' =>  'BANNER',  'slug' => 'banner' ],
        [ 'id' => 2,  'title' =>  'Header',  'sslug' => 'header' ]
    ];

    return view('blog', ['posts' => $posts]);
    });

