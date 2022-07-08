<?php

use App\Http\Controllers\Api\AdministradorController;
use App\Http\Controllers\Api\AdministradorInstitucionController;
use App\Http\Controllers\Api\ChoferController;
use App\Http\Controllers\Api\ChoferMicroController;
use App\Http\Controllers\Api\DueniosController;
use App\Http\Controllers\Api\InstitucionController;
use App\Http\Controllers\Api\LineaController;
use App\Http\Controllers\Api\MicroController;
use App\Http\Controllers\Api\PermisoLineaController;
use App\Http\Controllers\Api\UserController;
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
Route::get('admin',[AdministradorController::class,'index']);
Route::get('admin-institucion',[AdministradorInstitucionController::class,'index']);
Route::get('chofer',[ChoferController::class,'index']);
Route::put('chofer/{id}',[ChoferController::class,'update']);//id del usuario que tiene
/*Route::post('chofer',[ChoferController::class,'store']);
Route::put('chofer/{id}',[ChoferController::class,'update']);
Route::get('chofer/{id}',[ChoferController::class,'show']);
Route::delete('chofer/{id}',[ChoferController::class,'destroy']);
*/


Route::apiResource('linea',LineaController::class);
Route::apiResource('institucion',InstitucionController::class);
Route::apiResource('users',UserController::class);
Route::apiResource('duenio',DueniosController::class);
Route::apiResource('permiso-linea',PermisoLineaController::class);
Route::apiResource('micro',MicroController::class);
Route::apiResource('chofer-micro',ChoferMicroController::class);
Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
