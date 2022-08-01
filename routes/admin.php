<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdministradorController;
use App\Http\Controllers\ChoferMicroController;
use App\Http\Controllers\MicroController;
use App\Http\Controllers\DuenioController;
use App\Http\Controllers\DuenioLineaController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\LineaController;
use App\Http\Controllers\LineasController;
use App\Http\Controllers\MicrosController;
use App\Http\Controllers\PermisoLineaController;
use App\Http\Controllers\AdministradorInstitucionController;
use App\Http\Controllers\BackController;
use App\Http\Controllers\ChoferController;
use App\Http\Controllers\ChoferTarjetaController;
use App\Http\Controllers\InstitucionController;
use App\Http\Controllers\ProblemaController;
use App\Http\Controllers\roleController;

Route::get('/', function () {
});
Route::get('/home', [HomeController::class, 'index'])->name('home');
Route::resource('administradors', AdministradorController::class);
// Route::resource('administradors', AdministradorController::class);
Route::resource('linea',LineaController::class)->names('admin.linea');

Route::resource('dueniolinea',DuenioLineaController::class)->names('admin.dueniolinea');

Route::resource('duenio',DuenioController::class)->names('admin.duenio');
Route::get('duenio-baja-chofer/{id}',[DuenioController::class,'bajaChofer'])->name('admin.duenio.bajaChofer');
Route::post('dueniolinea-one',[DuenioLineaController::class,'storeOne'])->name('admin.dueniolinea.storeOne');
Route::get('duenio-micro/{id}',[DuenioController::class,'micros'])->name('admin.duenio.micro');
Route::get('duenio-activar-micro/{id}',[DuenioController::class,'activarMicro'])->name('admin.duenio.activarMicro');
Route::delete('duenio-eliminar-micro/{id}',[DuenioController::class,'eliminarMicro'])->name('admin.duenio.eliminarMicro');


Route::resource('permiso',PermisoLineaController::class)->names('admin.permiso'); //en el metodo show mandará el id de la linea
Route::get('permiso-asignar/{id}',[PermisoLineaController::class,'asignarPermiso'])->name('admin.permiso.asignarMicro');
Route::get('permiso-duenio/{id}',[PermisoLineaController::class,'showOne'])->name('admin.permiso.showOne');
Route::get('permiso-duenio-asignar/{id}',[PermisoLineaController::class,'asignarPermisoMicro'])->name('admin.permiso.asignarPermisoMicro');
Route::resource('micro',MicrosController::class)->names('admin.micro');
Route::resource('permiso',PermisoLineaController::class)->names('admin.permiso'); //en el metodo show mandará el id de la linea
Route::post('permiso-duenio',[PermisoLineaController::class,'storeOne'])->name('admin.permiso.storeOne');
Route::put('permiso-micro/{id}',[MicrosController::class,'asignarPermiso'])->name('admin.micro.asignarPermiso');
Route::get('micro-baja/{id}',[MicrosController::class,'darBajaMicro'])->name('admin.micro.baja');
Route::get('micro-chofer-baja/{id}',[MicrosController::class,'bajaChofer'])->name('admin.micro.bajaChofer');
Route::get('chofer-micro',[ApiChoferController::class,'choferMicro'])->name('admin.chofer.micro');
//chofer-tarjeta
Route::get('chofer-tarjeta-recorridos/{id}',[ChoferTarjetaController::class,'recorridosTarjeta'])->name('admin.choferTarjetaRecorrido');
Route::put('recorrido-tarjeta/{id}',[ChoferTarjetaController::class,'updateRecorridosTarjeta'])->name('admin.updatechoferTarjetaRecorrido');
Route::post('recorrido-tarjeta',[ChoferTarjetaController::class,'storeRecorridosTarjeta'])->name('admin.storechoferTarjetaRecorrido');
Route::get('finalizar-tarjeta/{id}',[ChoferTarjetaController::class,'finalizarTarjeta'])->name('admin.tarjetaFinalizar');
//************
Route::resource('administradors', AdministradorController::class);
Route::resource('institucions', InstitucionController::class);
Route::resource('administradorInstitucions', AdministradorInstitucionController::class);
Route::resource('chofers', ChoferController::class);
Route::resource('problema',ProblemaController::class)->names('admin.problema');

Route::resource('roles', roleController::class);
