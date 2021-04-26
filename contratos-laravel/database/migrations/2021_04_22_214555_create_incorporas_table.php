<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateIncorporasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('incorporas', function (Blueprint $table) {
            $table->bigInteger('ID_contrato')->unsigned();
            $table->foreign('ID_contrato')->references('ID_contrato')->on('contratos');
            $table->bigInteger('ID_perfil')->unsigned();
            $table->foreign('ID_perfil')->references('ID_perfil')->on('perfils');
            $table->integer('Cantidad');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('incorporas');
    }
}
