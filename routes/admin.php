<?php

use App\Http\Controllers\AdministradorController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return ("hoal");
});

Route::resource('administradors', AdministradorController::class);