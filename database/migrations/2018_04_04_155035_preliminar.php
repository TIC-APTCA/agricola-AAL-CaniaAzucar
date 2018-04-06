<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Preliminar extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('preliminar', function (Blueprint $table) {
            $table->increments('id');
            $table->date("fecha");
            $table->string('peso_neto');
            $table->decimal('peso_bruto',10,2);
            $table->decimal('peso_tara',10,2);
            $table->decimal('cana',10,2);
            $table->decimal('rendimiento',10,2);
            $table->decimal('azucar',10,2);
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
        //
    }
}
