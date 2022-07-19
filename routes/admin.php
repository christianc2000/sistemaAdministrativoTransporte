<?php

use App\Http\Controllers\AdministradorController;
use App\Http\Controllers\AdministradorInstitucionController;
use App\Http\Controllers\ChoferController;
use App\Http\Controllers\InstitucionController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return ("hoal");
});

Route::resource('administradors', AdministradorController::class);
Route::resource('institucions', InstitucionController::class);
Route::resource('administradorInstitucions', AdministradorInstitucionController::class);
Route::resource('chofers', ChoferController::class);