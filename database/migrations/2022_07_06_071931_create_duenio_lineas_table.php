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
            $table->integer('id_duenio')->unsigned();
            $table->integer('id_linea')->unsigned();

            $table->foreign('id_duenio')->on('duenios')->references('id')->onUpdate('cascade');
            $table->foreign('id_linea')->on('lineas')->references('id')->onUpdate('cascade');
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
