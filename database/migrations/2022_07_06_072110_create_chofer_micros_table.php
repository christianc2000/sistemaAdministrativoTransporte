<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateChoferMicrosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('chofer_micros', function (Blueprint $table) {
            $table->id();
            $table->date('fecha_asig');
            $table->date('fecha_baja');
            $table->timestamps();

            $table->integer('id_chofer')->unsigned();
            $table->integer('id_micro')->unsigned();
            $table->foreign('id_chofer')->on('chofers')->references('id')->onUpdate('cascade');
            $table->foreign('id_micro')->on('micros')->references('id')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('chofer_micros');
    }
}
