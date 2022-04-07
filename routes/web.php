<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UsuarioController;
use App\Http\Controllers\AppController;

Route::get('/', function () {
    return view('index');
});
Route::get('login', function () {
    return view('login');
});

/////////////////////ADMIN?/////////////////////////

Route::get('paginaempresa', function () {
    return view('paginaempresa');
});

Route::get('paginatrabajador', function () {
    return view('paginatrabajador');
});

Route::get('cPanelAdmin', function () {
    return view('cPanelAdmin');
});

/*--------------RUTAS DAVID--------------*/

/*LOGIN Y LOGOUT*/
Route::post('login', [UsuarioController::class, 'loginP']);
Route::get('logout', [UsuarioController::class, 'logout']);



///////////////////////MAIN/////////////////////

//LEER EL CONTENIDO
Route::post('mostrar',[AppController::class, 'mostrar']);
//Positivo
Route::post('si',[AppController::class, 'si']);
//negativo
Route::post('no',[AppController::class, 'no']);
