<?php

namespace App\Models\Archivos\Zonas;

use Illuminate\Database\Eloquent\Model;

class Municipios extends Model
{
/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'municipios';
	
	public static function getMunicipiosxEstado($id) {
		$resultados = Municipios::select('municipios.*')
		->where('estados_id', '=', $id)
		->get();
		
		return $resultados;
	}
}
