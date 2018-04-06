<?php

use Illuminate\Database\Seeder;

class ConceptosTipos extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
       // Insertar registros
		DB::table('conceptos_correlativo')->insert(array(
			'id'				=> 1,
			'asignacion' 		=> '1',
			'deduccion' 		=> '1',
		));
		
    }
}
