<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProveedorsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('proveedors', function (Blueprint $table) {
            $table->char('Rut_pro',10);
            $table->primary('Rut_pro');
            $table->integer('ID_ciudad')->unsigned();
            $table->foreign('ID_ciudad')->references('ID_ciudad')->on('ciudads');
            $table->String('Nombre_pro');
            $table->String('Giro_pro');
            $table->String('Nombre_domicilio_pro');
            $table->integer('Numero_domicilio_pro');
            $table->integer('Codigo_postal_pro');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('proveedors');
    }
}
