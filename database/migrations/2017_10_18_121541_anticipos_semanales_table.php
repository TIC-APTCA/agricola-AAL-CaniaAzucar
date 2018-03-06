<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AnticiposSemanalesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('anticipos_semanales', function (Blueprint $table) {
            $table->increments('id');
            $table->string('codigo');
            $table->decimal('factor');
            $table->string('descripcion');
            $table->decimal('porcentaje');
            $table->integer('semana');
            $table->date('fecha_inicial');
            $table->date('fecha_final');
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
        Schema::drop('anticipos_semanales');
    }
}
