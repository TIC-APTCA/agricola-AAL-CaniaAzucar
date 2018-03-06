<?php

use Illuminate\Database\Seeder;

class Frecuencias extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Insertar registros
		DB::table('frecuencias')->insert(array(
			'id'		    	=> 1,
			'descripcion' 		=> 'Fijo',
		));
		
		DB::table('frecuencias')->insert(array(
			'id'			    => 2,
			'descripcion' 		=> 'Variable',
		));
    }
}
