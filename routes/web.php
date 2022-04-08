<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UsuarioController;
use App\Http\Controllers\AppController;

Route::get('/', function () {
    return view('index');
});
Route::get('/home', function () {
    return view('home');
});

Route::get('verificar', function () {
    return view('verificacion');
});

Route::get('login', function () {
    return view('login');
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
Route::post('registroPost',[UsuarioController::class, 'registroPost']);
// Route::get('registro',[UsuarioController::class, 'registro']);
Route::post('registrar',[UsuarioController::class, 'registrar']);
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

//Verificar//


Route::post('verificarController', [UsuarioController::class, 'ActivateACC']);

///////////////////////MAIN/////////////////////

//LEER EL CONTENIDO
Route::post('mostrar',[AppController::class, 'mostrar']);
//Positivo
Route::post('si',[AppController::class, 'si']);
//negativo
Route::post('no',[AppController::class, 'no']);
