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
            $table->string('placa');
            $table->string('modelo');
            $table->integer('cant_asiento');
            $table->date('fecha_asignacion')->nullable();
            $table->date('fecha_baja')->nullable();
            $table->unsignedBigInteger('permiso_linea_id')->nullable();
            $table->foreign('permiso_linea_id')->references('id')->on('permiso_lineas')->onDelete('cascade')->onUpdate('cascade');

            $table->timestamps();
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
