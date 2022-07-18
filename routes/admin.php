<?php

use App\Http\Controllers\AdministradorController;
use App\Http\Controllers\DuenioController;
use App\Http\Controllers\DuenioLineaController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\LineaController;
use App\Http\Controllers\LineasController;
use App\Http\Controllers\PermisoLineaController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return ("hoal");
});
Route::get('/home', [HomeController::class, 'index'])->name('home');
Route::resource('administradors', AdministradorController::class);
Route::resource('linea',LineaController::class)->names('admin.linea');
Route::resource('duenio',DuenioController::class)->names('admin.duenio');
Route::resource('dueniolinea',DuenioLineaController::class)->names('admin.dueniolinea');
Route::resource('permiso',PermisoLineaController::class)->names('admin.permiso'); //en el metodo show mandará el id de la linea