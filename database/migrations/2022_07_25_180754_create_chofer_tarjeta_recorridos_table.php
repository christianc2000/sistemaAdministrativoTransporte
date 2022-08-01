<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateChoferTarjetaRecorridosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('chofer_tarjeta_recorridos', function (Blueprint $table) {
            $table->id();
            $table->time('hora_finalizado')->nullable();
            $table->foreignId('chofer_tarjeta_id')->references('id')->on('chofer_tarjetas')->onDelete('cascade')->onUpdate('cascade');
            $table->foreignId('recorrido_tarjeta_id')->references('id')->on('recorrido_tarjetas')->onDelete('cascade')->onUpdate('cascade');
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
        Schema::dropIfExists('chofer_tarjeta_recorridos');
    }
}
