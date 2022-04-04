<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UsuarioController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('login');
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
Route::get('pruebaregistrar', function () {
    return view('pruebaregistrar');
});
Route::get('pruebaregistrarempresa', function () {
    return view('pruebaregistrarempresa');
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
