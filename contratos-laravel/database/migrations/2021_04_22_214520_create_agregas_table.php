<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAgregasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('agregas', function (Blueprint $table) {
            $table->bigInteger('ID_contrato')->unsigned();
            $table->foreign('ID_contrato')->references('ID_contrato')->on('contratos');
            $table->bigInteger('ID_clausula')->unsigned();
            $table->foreign('ID_clausula')->references('ID_clausula')->on('clausulas');
            $table->String('Cambios_a_clausula');
            
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('agregas');
    }
}
