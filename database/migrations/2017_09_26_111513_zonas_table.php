<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class ZonasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('zonas_geograficas', function (Blueprint $table) {
            $table->increments('id');
            $table->string('descripcion');
            $table->integer('estados_id')->unsigned();
            $table->foreign('estados_id')->references('id')->on('estados');
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
        Schema::drop('zonas_geograficas');
    }
}
