<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePerfilsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('perfils', function (Blueprint $table) {
            $table->id('ID_perfil');
            $table->String('Tipo_procesador');
            $table->String('Ram');
            $table->String('Lector_dvd');
            $table->String('Tarjeta_sonido');
            $table->String('Tarjeta_red');
            $table->String('Teclado');
            $table->String('Gabinete');
            $table->String('Mouse');
            $table->String('Fuente_de_poder');
            $table->String('SSD');
            $table->boolean('Bajo_impacto_acustico');
            $table->integer('Valor_perfil');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('perfils');
    }
}
