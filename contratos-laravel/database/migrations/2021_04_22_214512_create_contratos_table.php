<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateContratosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('contratos', function (Blueprint $table) {
            $table->id('ID_contrato');
            $table->char('Rut_re',10)->unsigned();
            $table->foreign('Rut_re')->references('Rut_re')->on('representante_provs');
            $table->char('Rut_pro',10)->unsigned();
            $table->foreign('Rut_pro')->references('Rut_pro')->on('proveedors');
            $table->integer('ID_estado')->unsigned();
            $table->foreign('ID_estado')->references('ID_estado')->on('estados');
            $table->date('Fecha_inicial');
            $table->date('Fecha_termino');
            $table->String('PDF_base');
            $table->String('PDF_firmado');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('contratos');
    }
}
