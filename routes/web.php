<?php

use App\Http\Controllers\MailController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UsuarioController;
use App\Http\Controllers\AppController;
///ZONA ADMINISTRADOR
//Acceder a vista Admin
Route::get('cPanelAdmin',[UsuarioController::class, 'vistaAdmin']);

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
///ZONA ADMINISTRADOR

///ZONA NOTIFICACIONES
//Acceder a vista Notificaciones
Route::get('notificaciones',[UsuarioController::class, 'vistaNotificaciones']);

//leernotificacionesJS
Route::post('leernotificaciones',[UsuarioController::class, 'leernotificaciones']);

///ZONA NOTIFICACIONES

/*EDITAR PERFIL*/
//Vista perfil
Route::get('perfil',[UsuarioController::class, 'vistaPerfil']);
// mostrarperfil.
Route::post('leerperfil',[UsuarioController::class, 'leerperfiledit']);
// editarperfil
Route::put('editarperfil/{id}/{id_perfil}',[UsuarioController::class, 'editarperfil']);
/*FIN EDITAR PERFIL*/

///mandar correo chat
Route::post('mandar', [MailController::class, 'sending']);





//ir a contenido principal
Route::get('principal',[AppController::class, 'vistaPrincipal']);
//LEER EL CONTENIDO
Route::post('mostrar',[AppController::class, 'mostrar']);
//Positivo
Route::post('si',[AppController::class, 'si']);
//negativo
Route::post('no',[AppController::class, 'no']);

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

/* Route::get('prueba1', function () {
    return view('home1');
}); */

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

Route::get('registrar', function () {
    return view('registrar');
});
/*--------------RUTAS DAVID--------------*/

/*LOGIN Y LOGOUT*/
Route::post('login', [UsuarioController::class, 'loginP']);
Route::get('logout', [UsuarioController::class, 'logout']);
//Ruta para el registro de trabajadores
// Route::get('registro',[UsuarioController::class, 'registro']);
Route::post('registroPost',[UsuarioController::class, 'registroPost']);
//Ruta para el registro de empresas
// Route::get('registroEmpresa',[UsuarioController::class, 'registroEmpresa']);
Route::post('registroEmpresaPost',[UsuarioController::class, 'registroEmpresaPost']);


