<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UsuarioController;

Route::get('/', function () {
    return view('login');
});

// NAVBAR //

Route::get('prueba', function () {
    return view('home');
});

Route::get('prueba1', function () {
    return view('home1');
});

Route::get('prueba2', function () {
    return view('home2');
});

Route::get('prueba3', function () {
    return view('home3');
});

Route::get('prueba4', function () {
    return view('home4');
});

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

