<?php

use App\Http\Controllers\AdministradorController;
use App\Http\Controllers\DuenioController;
use App\Http\Controllers\DuenioLineaController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\LineasController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return ("hoal");
});
Route::get('/home', [HomeController::class, 'index'])->name('home');
Route::resource('administradors', AdministradorController::class);
Route::resource('linea',LineasController::class)->names('admin.linea');
Route::resource('duenio',DuenioController::class)->names('admin.duenio');
Route::resource('dueniolinea',DuenioLineaController::class)->names('admin.dueniolinea');