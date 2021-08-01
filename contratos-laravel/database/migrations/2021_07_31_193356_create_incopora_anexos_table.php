<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateIncoporaAnexosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('incopora_anexos', function (Blueprint $table) {
            $table->bigInteger('ID_anexo')->unsigned();
            $table->foreign('ID_anexo')->references('ID_anexo')->on('anexos');
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
        Schema::dropIfExists('incopora_anexos');
    }
}
