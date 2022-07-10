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
            
            $table->foreignId('chofer_id')->references('id')->on('chofers');
            $table->foreignId('requisito_id')->references('id')->on('requisitos');
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
        Schema::dropIfExists('chofer_requisitos');
    }
}
