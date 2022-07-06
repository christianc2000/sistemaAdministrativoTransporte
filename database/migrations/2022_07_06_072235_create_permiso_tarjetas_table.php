<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePermisoTarjetasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('permiso_tarjetas', function (Blueprint $table) {
            $table->id();
            $table->date('fecha');
            $table->integer('nro_interno');
            $table->timestamps();

            $table->integer('id_chofer')->unsigned();
            $table->integer('id_tarjeta')->unsigned();
            $table->foreign('id_chofer')->on('chofers')->references('id')->onUpdate('cascade');
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
        Schema::dropIfExists('permiso_tarjetas');
    }
}
