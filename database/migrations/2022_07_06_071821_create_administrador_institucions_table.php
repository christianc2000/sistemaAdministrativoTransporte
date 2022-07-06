<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAdministradorInstitucionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('administrador_institucions', function (Blueprint $table) {
            $table->id();
            $table->timestamps();

            $table->integer('id_institucion')->unsigned();
            $table->foreign('id_institucion')->on('institucions')->references('id')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('administrador_institucions');
    }
}