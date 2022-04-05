<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UsuarioController;

//Acceder a vista Admin
Route::get('admin',[UsuarioController::class, 'vistaAdmin']);

//leerJS
Route::post('leer',[UsuarioController::class,'leer']);

//perfilesJS
Route::post('perfiles',[UsuarioController::class,'perfiles']);

//crearJS
Route::post('crearuser',[UsuarioController::class,'crearuser']);

//estadouserJS
Route::put('estadouser/{id}',[UsuarioController::class,'estadouser']);

//mostrarmodaluserJS
Route::post('mostrarmodaluser/{id}/{id_perfil}',[UsuarioController::class,'mostrarmodaluser']);

//modificaruserJS
Route::put('modificaruser/{id}/{id_perfil}',[UsuarioController::class,'modificaruser']);

//eliminaruserJS
Route::delete('eliminaruser/{id}/{id_perfil}',[UsuarioController::class,'eliminaruser']);

////////
Route::get('/', function () {
    return view('index');
});
Route::get('login', function () {
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

