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

            $table->foreignId('chofer_id')->references('id')->on('chofers')->onDelete('cascade')->onUpdate('cascade');
            $table->foreignId('micro_id')->references('id')->on('micros')->onDelete('cascade')->onUpdate('cascade');

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
        Schema::dropIfExists('chofer_micros');
    }
}
