<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class TablonesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tablones', function (Blueprint $table) {
            $table->increments('id');
            $table->integer("zafras_id")->unsigned();
            $table->foreign("zafras_id")->references("id")->on("zafras");
            $table->integer("sectores_id")->unsigned();
            $table->foreign("sectores_id")->references("id")->on("sectores");
            $table->string("descripcion");
            $table->date("fecha_corte");
            $table->integer("superficie");
            $table->integer("variedades_id");
            $table->integer("clases_id");
            $table->integer("status_id");
            
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
        Schema::drop('tablones');
    }
}
