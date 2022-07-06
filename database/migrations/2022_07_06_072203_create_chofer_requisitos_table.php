<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateChoferRequisitosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('chofer_requisitos', function (Blueprint $table) {
            $table->id();
            $table->boolean('presenta');
            $table->timestamps();

            $table->integer('id_chofer')->unsigned();
            $table->integer('id_requisito')->unsigned();
            $table->foreign('id_chofer')->on('chofers')->references('id')->onUpdate('cascade');
            $table->foreign('id_requisito')->on('requisitos')->references('id')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('chofer_requisitos');
    }
}
