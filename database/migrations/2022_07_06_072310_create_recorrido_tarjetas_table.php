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
            $table->datetime('hora_partida');
            $table->datetime('hora_llegada');

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
