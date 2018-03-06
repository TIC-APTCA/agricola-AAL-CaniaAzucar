<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class LiquidacionConceptosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('liquidacion_conceptos', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('tipos_id')->unsigned();
            $table->foreign('tipos_id')->references('id')->on('conceptos_tipos');
            $table->string('codigo');
            $table->string('descripcion');
            $table->integer('frecuencias_id')->unsigned();
            $table->foreign('frecuencias_id')->references('id')->on('frecuencias');
            
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
        Schema::drop('liquidacion_conceptos');
    }
}
