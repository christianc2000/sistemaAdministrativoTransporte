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

            $table->timestamps();
            $table->unsignedBigInteger('id_duenio');
            $table->unsignedBigInteger('id_linea');

            $table->foreign('id_duenio')->on('duenios')->references('id');
            $table->foreign('id_linea')->on('lineas')->references('id');
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
