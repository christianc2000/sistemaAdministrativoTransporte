<?php

use App\Http\Controllers\Api\ChoferController;
use App\Http\Controllers\Api\InstitucionController;
use App\Http\Controllers\Api\LineaController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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
Route::get('chofer',[ChoferController::class,'index']);
Route::post('chofer',[ChoferController::class,'store']);
Route::put('chofer/{id}',[ChoferController::class,'update']);
Route::get('chofer/{id}',[ChoferController::class,'show']);
Route::delete('chofer/{id}',[ChoferController::class,'destroy']);

Route::get('linea',[LineaController::class,'index']);
Route::post('linea',[LineaController::class,'store']);
Route::put('linea/{id}',[LineaController::class,'update']);
Route::get('linea/{id}',[LineaController::class,'show']);
Route::delete('linea/{id}',[LineaController::class,'destroy']);

Route::get('institucion',[InstitucionController::class,'index']);
Route::post('institucion',[InstitucionController::class,'store']);
Route::put('institucion/{id}',[InstitucionController::class,'update']);
Route::get('institucion/{id}',[InstitucionController::class,'show']);
Route::delete('institucion/{id}',[InstitucionController::class,'destroy']);

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
