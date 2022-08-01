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
            $table->boolean('activo');
            $table->foreignId('chofer_id')->references('id')->on('chofers')->onDelete('cascade')->onUpdate('cascade');
            $table->foreignId('tarjeta_id')->references('id')->on('tarjetas')->onDelete('cascade')->onUpdate('cascade');
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
