<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRecorridoTarjetasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('recorrido_tarjetas', function (Blueprint $table) {
            $table->id();
            $table->integer('nro_recorrido');
            $table->date('hora_partida');
            $table->date('hora_llegada');

            $table->timestamps();

            $table->integer('id_tarjeta')->unsigned();
            $table->foreign('id_tarjeta')->on('tarjetas')->references('id')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('recorrido_tarjetas');
    }
}
