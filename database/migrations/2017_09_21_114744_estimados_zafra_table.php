<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class EstimadosZafraTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('estimados_zafra', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('zafras_id')->unsigned();
            $table->foreign('zafras_id')->references('id')->on('zafras');
            $table->string('rendimiento');
            $table->string('cana');
            $table->string('azucar');
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
        Schema::drop('estimados_zafra');
    }
}
