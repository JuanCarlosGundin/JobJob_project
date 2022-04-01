<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AppController;
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

Route::get('/principal', function () {
    return view('principal');
});
//LEER EL CONTENIDO
Route::post('mostrar',[AppController::class, 'mostrar']);
//Positivo
Route::post('si',[AppController::class, 'si']);
//negativo
Route::post('no',[AppController::class, 'no']);
