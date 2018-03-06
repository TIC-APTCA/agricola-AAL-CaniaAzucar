<?php

use Illuminate\Database\Seeder;

class Usuarios extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Insertar registros
		DB::table('usuarios')->insert(array(
			'codigo'			=> 10000,
			'cedula' 			=> 15093281,
			'nombres'  			=> 'Ramon Jose',
			'apellidos'			=> 'Gimenez Tamayo',
			'email'     		=> '15093281@aptca.gob.ve',
			'password'  		=>  Hash::make('12345678'),
		));
    }
}
