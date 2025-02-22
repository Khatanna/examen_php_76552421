<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LibroController;
use App\Http\Controllers\AutorController;
use App\Http\Controllers\ClienteController;
use App\Http\Controllers\PrestamosController;
/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/libros', [LibroController::class, 'index']);
Route::get('/libros/{id}', [LibroController::class, 'show']);
Route::post('/libros', [LibroController::class, 'store']);
Route::put('/libros/{id}', [LibroController::class, 'update']);
Route::delete('/libros/{id}', [LibroController::class, 'delete']);

Route::get('/autores', [AutorController::class, 'index']);
Route::get('/autores/{id}', [AutorController::class, 'show']);
Route::post('/autores', [AutorController::class, 'store']);
Route::put('/autores/{id}', [AutorController::class, 'update']);
Route::delete('/autores/{id}', [AutorController::class, 'delete']);

Route::get('/clientes', [ClienteController::class, 'index']);
Route::get('/clientes/prestamos', [ClienteController::class, 'prestamos_vencidos']);
Route::get('/clientes/{id}', [ClienteController::class, 'show']);
Route::post('/clientes', [ClienteController::class, 'store']);
Route::put('/clientes/{id}', [ClienteController::class, 'update']);
Route::delete('/clientes/{id}', [ClienteController::class, 'delete']);

Route::get('/prestamos', [PrestamosController::class, 'index']);
Route::post('/prestamos', [PrestamosController::class, 'store']);
Route::put('/prestamos/{id}/devolucion', [PrestamosController::class, 'devolucion']);
