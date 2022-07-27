<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDuenioLineasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('duenio_lineas', function (Blueprint $table) {
            $table->id();

            $table->decimal('aporte');
            $table->date('fecha');
            $table->text('descripcion_aporte')->nullable();
            $table->decimal('aporte_pagado')->default(0);
            $table->foreignId('duenio_id')->references('id')->on('duenios')->onDelete('cascade')->onUpdate('cascade');
            $table->foreignId('linea_id')->references('id')->on('lineas');

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
        Schema::dropIfExists('duenio_lineas');
    }
}
