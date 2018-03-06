<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class ZafrasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('zafras', function (Blueprint $table) {
            $table->increments('id');
            $table->string('codigo');
            $table->char('status');
            $table->string('descripcion');
            $table->date('fecha_inicial');
            $table->date('fecha_final');
            $table->string('observaciones');
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
        Schema::drop('zafras');
    }
}
