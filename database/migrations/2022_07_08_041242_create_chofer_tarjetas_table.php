<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateChoferTarjetasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('chofer_tarjetas', function (Blueprint $table) {
            $table->id();
            $table->date('fecha');
            $table->integer('nro_interno');

            $table->foreignId('chofer_id')->references('id')->on('chofers');
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
        Schema::dropIfExists('chofer_tarjetas');
    }
}
