<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMicrosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('micros', function (Blueprint $table) {
            $table->id();
            $table->integer('nro_interno');
            $table->integer('placa');
            $table->integer('modelo');
            $table->integer('cant_asiento');
            $table->integer('foto');
            $table->integer('fecha_asignacion');
            $table->integer('fecha_baja');
           
            $table->timestamps();
            $table->unsignedBigInteger('id_permiso_linea');

            $table->foreign('id_permiso_linea')->on('permiso_lineas')->references('id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('micros');
    }
}
