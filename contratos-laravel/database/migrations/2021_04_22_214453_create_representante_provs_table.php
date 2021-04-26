<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRepresentanteProvsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('representante_provs', function (Blueprint $table) {
            $table->id('ID_representante');
            $table->bigInteger('ID_ciudad')->unsigned();
            $table->foreign('ID_ciudad')->references('ID_ciudad')->on('ciudads');
            $table->char('Rut_re',10)->unique();
            $table->String('Nombre_re');
            $table->String('Organizacion_re');
            $table->String('Nombre_domicilio_re');
            $table->integer('Numero_domicilio_re');
            $table->integer('Codigo_postal_re');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('representante_provs');
    }
}
