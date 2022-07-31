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
            $table->time('hora_partida');
            $table->time('hora_llegada');
            $table->boolean('tipo_recorrido')->nullable();//0 cuando es de ida, 1 cuando es de vuelta

            $table->foreignId('tarjeta_id')->references('id')->on('tarjetas');

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
        Schema::dropIfExists('recorrido_tarjetas');
    }
}
