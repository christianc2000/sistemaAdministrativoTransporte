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
            $table->boolean('activo')->default(false);
            
            $table->foreignId('linea_id')->references('id')->on('lineas');
           // $table->foreignId('duenio_id')->references('id')->on('duenios');
            $table->unsignedBigInteger('duenio_id')->nullable();
            $table->foreign('duenio_id')->references('id')->on('duenios')->onDelete('cascade')->onUpdate('cascade');
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
        Schema::dropIfExists('permiso_lineas');
    }
}
