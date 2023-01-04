<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CategoriaController;

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


Route::get('/categoria/lista',[CategoriaController::class, 'index']);
Route::get('/categoria/{id}',[CategoriaController::class, 'edit']);

Route::post('/categoria/registrar',[CategoriaController::class, 'store']);
Route::put('/categoria/actualizar',[CategoriaController::class, 'update']);
Route::delete('/categoria/{id}',[CategoriaController::class, 'destroy']);


Route::post('/categoria/desactivar',[CategoriaController::class, 'desactivar']);
Route::post('/categoria/activar',[CategoriaController::class, 'activar']);



// Route::get('/categoria',[CategoriaController::class, 'index']);
// Route::get('/categoria',[CategoriaController::class, 'index']);
// Route::resource('/categoria',CategoriaController::class);





