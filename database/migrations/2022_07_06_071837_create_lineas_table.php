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

            $table->timestamps();

            $table->integer('id_institucion')->unsigned();
            $table->integer('id_admin_institucion')->unsigned();

            $table->foreign('id_institucion')->on('institucions')->references('id')->onUpdate('cascade');
            $table->foreign('id_admin_institucion')->on('administrador_institucions')->references('id')->onUpdate('cascade');
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
