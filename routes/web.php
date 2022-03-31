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