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
		DB::table('conceptos_tipos')->insert(array(
			'id'				=> 1,
			'descripcion' 		=> 'Asignacion',
		));
		
		DB::table('conceptos_tipos')->insert(array(
			'id'				=> 2,
			'descripcion' 		=> 'Deduccion',
		));
    }
}
