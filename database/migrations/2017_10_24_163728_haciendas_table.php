<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class HaciendasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('haciendas', function (Blueprint $table) {
            $table->increments('id');
            $table->string('codigo');
            $table->integer('zonas_id')->unsigned();
            $table->foreign('zonas_id')->references('id')->on('zonas_geograficas');
            $table->string('telefono');
            $table->string('descripcion');
            $table->string('direccion');
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
        Schema::drop('haciendas');
    }
}
