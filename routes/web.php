<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UsuarioController;
use App\Http\Controllers\AppController;



Route::get('/',[UsuarioController::class,'index']);

//LEER EL CONTENIDO
Route::post('mostrar',[AppController::class, 'mostrar']);
//Positivo
Route::post('si',[AppController::class, 'si']);
//negativo
Route::post('no',[AppController::class, 'no']);
