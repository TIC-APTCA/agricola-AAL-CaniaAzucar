<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class EstimadosFechaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('estimados_fecha', function (Blueprint $table) {
            $table->increments('id');
            $table->date('fecha_inicial');
            $table->date('fecha_final');
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
        Schema::drop('estimados_fecha');
    }
}
