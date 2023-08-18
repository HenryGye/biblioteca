<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::group(['middleware' => 'auth:sanctum'], function () {
    Route::post('/login', [\App\Http\Controllers\Auth\LoginController::class, 'login']);
    Route::post('/logout', [\App\Http\Controllers\Auth\LogoutController::class, 'logout']);

    Route::resource('categoria', App\Http\Controllers\CategoriaController::class)->only(['index','store','show','update','destroy']);
    Route::resource('libro', App\Http\Controllers\LibroController::class)->only(['index','store','show','update','destroy']);

    Route::put('rentar-libro/{id}', [App\Http\Controllers\LibroController::class, 'rentaLibro']);
    Route::get('listar-libros-disponibles', [App\Http\Controllers\LibroController::class, 'listarLibrosDisponibles']);

});

Route::post('/register', [\App\Http\Controllers\Auth\RegisterController::class, 'register']);