<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePermisoLineasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('permiso_lineas', function (Blueprint $table) {
            $table->id();
            $table->boolean('activo');
            $table->timestamps();

            $table->integer('id_linea')->unsigned();
            $table->integer('id_duenio')->unsigned();

            $table->foreign('id_linea')->on('lineas')->references('id')->onUpdate('cascade');
            $table->foreign('id_duenio')->on('duenios')->references('id')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('permiso_lineas');
    }
}
