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
            $table->date('fecha_baja')->nullable();
            $table->timestamps();

            $table->unsignedBigInteger('id_chofer');
            $table->unsignedBigInteger('id_micro');
            $table->foreign('id_chofer')->on('chofers')->references('id');
            $table->foreign('id_micro')->on('micros')->references('id');
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
