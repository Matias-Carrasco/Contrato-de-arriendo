<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAnexosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('anexos', function (Blueprint $table) {
            $table->id('ID_anexo');
            $table->bigInteger('ID_contrato')->unsigned();
            $table->foreign('ID_contrato')->references('ID_contrato')->on('contratos');
            $table->bigInteger('ID_estado')->unsigned();
            $table->foreign('ID_estado')->references('ID_estado')->on('estados');
            $table->String('PDF_anexo')->nullable(true);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('anexos');
    }
}
