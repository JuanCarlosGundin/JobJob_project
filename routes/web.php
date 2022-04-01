<?php

use App\Http\Controllers\UsuarioController;
use Illuminate\Support\Facades\Route;

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

//Acceder a vista Admin
Route::get('admin',[UsuarioController::class, 'vistaAdmin']);

//leerJS
Route::post('leer',[UsuarioController::class,'leer']);

//estadouserJS
Route::put('estadouser/{id}',[UsuarioController::class,'estadouser']);

//perfiles
Route::post('perfiles',[UsuarioController::class,'perfiles']);

//crearJS
Route::post('crear',[UsuarioController::class,'crear']);