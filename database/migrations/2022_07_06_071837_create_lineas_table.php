<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLineasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('lineas', function (Blueprint $table) {
            $table->id();
            $table->integer('nrolinea');
            $table->integer('telefono');
            $table->string('sede');
            $table->string('foto')->nullable();
            
            $table->foreignId('institucion_id')->references('id')->on('institucions');
            $table->foreignId('administrador_institucion_id')->references('id')->on('administrador_institucions');

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
        Schema::dropIfExists('lineas');
    }
}
