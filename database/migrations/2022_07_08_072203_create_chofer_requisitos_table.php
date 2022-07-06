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

            $table->unsignedBigInteger('id_chofer');
            $table->unsignedBigInteger('id_requisito');
            $table->foreign('id_chofer')->on('chofers')->references('id');
            $table->foreign('id_requisito')->on('requisitos')->references('id');
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
