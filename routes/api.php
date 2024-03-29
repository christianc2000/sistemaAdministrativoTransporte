<?php

use App\Http\Controllers\Api\AdministradorController;
use App\Http\Controllers\Api\AdministradorInstitucionController;
use App\Http\Controllers\Api\ChoferController;
use App\Http\Controllers\Api\ChoferMicroController;
use App\Http\Controllers\Api\ChoferRequisitoController;
use App\Http\Controllers\Api\DueniosController;
use App\Http\Controllers\Api\InstitucionController;
use App\Http\Controllers\Api\LineaController;
use App\Http\Controllers\Api\MicroController;
use App\Http\Controllers\Api\PermisoLineaController;
use App\Http\Controllers\Api\UserController;
use App\Http\Controllers\Api\ChoferTarjetaController;
use App\Http\Controllers\Api\ChoferTarjetaRecorridoController;
use App\Http\Controllers\Api\DuenioLineaController;
use App\Http\Controllers\Api\ProblemaController;
use App\Http\Controllers\Api\RecorridoTarjetaController;
use App\Http\Controllers\Api\TarjetaController;
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

Route::get('admin', [AdministradorController::class, 'index']);
Route::get('admin-institucion', [AdministradorInstitucionController::class, 'index']);
Route::get('chofer', [ChoferController::class, 'index']);
Route::put('chofer/{id}', [ChoferController::class, 'update']); //id del usuario que tiene
/*Route::post('chofer',[ChoferController::class,'store']);
Route::put('chofer/{id}',[ChoferController::class,'update']);
Route::get('chofer/{id}',[ChoferController::class,'show']);
Route::delete('chofer/{id}',[ChoferController::class,'destroy']);
*/



//**********usuario */
//Route::apiResource('user',UserController::class);

Route::post('register', [UserController::class, 'register'])->name('api.v1.register');
Route::post('login', [UserController::class, 'login']);
Route::get('login', [UserController::class, 'loginget'])->name('api.v1.login');
Route::get('user-all', [UserController::class, 'index'])->name('api.v1.user');;
Route::get('lineas-users', [ChoferMicroController::class, 'lineasUsers']);
//Route::get('problema/{id}',[ProblemaController::class,'index'])->name('api.v1.problema');


Route::group(['middleware' => ["auth:sanctum"]], function () {
    Route::get('profile', [UserController::class, 'profile']);
    Route::put('editProfile', [UserController::class, 'editProfile']);
    Route::get('logout', [UserController::class, 'logout']);
    Route::get('admin', [AdministradorController::class, 'index']);
    Route::get('admin-institucion', [AdministradorInstitucionController::class, 'index']);
    Route::get('chofer', [ChoferController::class, 'index']);
    Route::put('chofer/{id}', [ChoferController::class, 'update']); //id del usuario que tiene
    Route::get('chofer-micros', [ChoferController::class, 'choferMicros']);
    Route::get('micro-activo', [ChoferController::class, 'microActivo']);
    Route::get('linea-activa', [ChoferController::class, 'lineaActiva']);
    /*******PROBLEMA */
    Route::get('problema', [ProblemaController::class, 'index'])->name('api.v1.problema.index'); //muestra todos los problemas que tiene el chofer logueado con sus micros
    Route::get('problema-micro-activo', [ProblemaController::class, 'problemasMicroActivo'])->name('api.v1.problema.problemaMicroActivo'); //muestra todos lo problemas que tiene el chofer logueado con el micro que está usando
    Route::post('problema', [ProblemaController::class, 'store'])->name('api.v1.problema.store');
    Route::put('problema/{id}', [ProblemaController::class, 'update'])->name('api.v1.problema.put');
    Route::get('problema/{id}', [ProblemaController::class, 'show'])->name('api.v1.problema.show');
    Route::delete('problema/{id}', [ProblemaController::class, 'destroy'])->name('api.v1.problema.destroy');
    /*************** */
    Route::apiResource('chofer-tarjeta-recorrido', ChoferTarjetaRecorridoController::class);
    Route::get('chofer-tarjeta-activo', [ChoferTarjetaRecorridoController::class, 'choferTarjetaActivo']);
    Route::get('recorridos-chofer-tarjeta-activo', [ChoferTarjetaRecorridoController::class, 'recorridosTarjetaActivo']);
    Route::get('tiempo-recorridos-chofer-tarjeta-activo', [ChoferTarjetaRecorridoController::class, 'tiempoRecorridosTarjetaActivo']);


    Route::apiResource('linea', LineaController::class);
    Route::apiResource('institucion', InstitucionController::class);
    Route::apiResource('duenio', DueniosController::class);
    Route::apiResource('permiso-linea', PermisoLineaController::class);
    Route::apiResource('micro', MicroController::class);
    Route::apiResource('chofer-micro', ChoferMicroController::class);
    Route::apiResource('chofer-requisito', ChoferRequisitoController::class);
    Route::apiResource('chofer-tarjeta', ChoferTarjetaController::class);
    Route::apiResource('duenio-linea', DuenioLineaController::class);
    Route::apiResource('tarjeta', TarjetaController::class);
    Route::apiResource('recorrido', RecorridoTarjetaController::class);
});
/*Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});*/
