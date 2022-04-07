<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UsuarioController;

Route::get('/', function () {
    return view('index');
});

Route::get('verificacion', function () {
    return view('verificacion');
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
Route::get('registrar', function () {
    return view('registrar');
});
Route::get('editarperfil', function () {
    return view('editarperfil');
});
/*--------------RUTAS DAVID--------------*/

/*LOGIN Y LOGOUT*/
Route::post('login', [UsuarioController::class, 'loginP']);
Route::get('logout', [UsuarioController::class, 'logout']);
//Ruta para el registro de trabajadores
// Route::get('registro',[UsuarioController::class, 'registro']);
Route::post('registrar',[UsuarioController::class, 'registrar']);
Route::post('registroPost',[UsuarioController::class, 'registroPost']);
Route::post('loginP',[UsuarioController::class, 'loginP']);
//Ruta para el registro de empresas
// Route::get('registroEmpresa',[UsuarioController::class, 'registroEmpresa']);
Route::post('registroEmpresaPost',[UsuarioController::class, 'registroEmpresaPost']);

/*EDITAR PERFIL*/
// ruta para modificar perfil trabajador.
Route::post('leertrabajador',[UsuarioController::class, 'leertrabajadorController']);
// ruta para modificar trabajador.
Route::put('modificartrabajador',[UsuarioController::class, 'modificartrabajadorController']);
// ruta para eliminar trabajador.
Route::delete('eliminartrabajador/{id}', [UsuarioController::class, 'eliminartrabajadorController']);
/*FIN EDITAR PERFIL*/

