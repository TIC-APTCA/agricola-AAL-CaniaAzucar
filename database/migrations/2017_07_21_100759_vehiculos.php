<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Vehiculos extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('vehiculos', function (Blueprint $table) {
        	$table->increments('id');
        	$table->string('placa');
            $table->integer('vehiculos_tipos_id')->unsigned();
            $table->foreign('vehiculos_tipos_id')->references('id')->on('vehiculos_tipos');
            $table->integer('vehiculos_marcas_id')->unsigned();
            $table->foreign('vehiculos_marcas_id')->references('id')->on('vehiculos_marcas');
            $table->integer('vehiculos_modelos_id')->unsigned();
            $table->foreign('vehiculos_modelos_id')->references('id')->on('vehiculos_modelos');
            $table->integer('remolque');
            $table->string('placa_remolque');
            $table->string('descripcion_remolque');
            
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
        Schema::drop('vehiculos');
    }
}
