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
            $table->unsignedBigInteger('id_chofer');
            $table->unsignedBigInteger('id_tarjeta');
            $table->foreign('id_chofer')->on('chofers')->references('id');
            $table->foreign('id_tarjeta')->on('tarjetas')->references('id');
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
