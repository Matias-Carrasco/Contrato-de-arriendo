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
            $table->bigInteger('ID_representante')->unsigned();
            $table->foreign('ID_representante')->references('ID_representante')->on('representante_provs');
            $table->bigInteger('ID_proveedor')->unsigned();
            $table->foreign('ID_proveedor')->references('ID_proveedor')->on('proveedors');
            $table->bigInteger('ID_estado')->unsigned();
            $table->foreign('ID_estado')->references('ID_estado')->on('estados');
            $table->date('Fecha_inicial');
            $table->date('Fecha_termino');
            $table->String('PDF_base')->nullable(true);
            $table->String('PDF_firmado')->nullable(true);
            $table->integer('Cod_licitacion')->nullable(true);
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
