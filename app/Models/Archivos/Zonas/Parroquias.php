<?php

namespace App\Models\Archivos\Zonas;

use Illuminate\Database\Eloquent\Model;

class Parroquias extends Model
{
/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'parroquias';
	
	public function getParroquiasxMun($id) {
		$resultados = Parroquias::select('parroquias.*')
		->where('municipios_id', '=', $id)
		->get();
		
		return $resultados;
	}
}
