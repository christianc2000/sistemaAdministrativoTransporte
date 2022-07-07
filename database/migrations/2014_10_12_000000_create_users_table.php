<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('ci')->unique();
            $table->string('password');
            $table->string('nombre');
            $table->string('apellido');
            $table->string('sexo',1);
            $table->date('fecha_nac');
            $table->integer('telefono');
            $table->string('email')->unique();
            $table->string('tipo',1); //A=Administrador,I=AdministradorInstitución,C=Chofer
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
        Schema::dropIfExists('users');
    }
}
