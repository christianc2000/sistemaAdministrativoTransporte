<?php

use App\Http\Controllers\LineasController;
use Illuminate\Support\Facades\Auth;
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

Route::get('/', function () {
    return view('inicio.index');
});

Auth::routes();

Route::resource('requisitos', 'App\Http\Controllers\RequisitosController');

Route::resource('tarjetas', 'App\Http\Controllers\TarjetaController');

Route::resource('recorridos', 'App\Http\Controllers\RecorridoTarjetaController');

Route::resource('chofertarjetas', 'App\Http\Controllers\ChoferTarjetaController');

Route::get('/linea',[LineasController::class,'index'])->name('linea.index');
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
