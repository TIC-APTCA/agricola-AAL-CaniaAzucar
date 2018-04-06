<?php

namespace App\Models\Liquidacion\Correlativo;

use Illuminate\Database\Eloquent\Model;

class CorrelativoRepo extends Model
{
    /* The database table used by the model.
	*
	* @var string
	*/
	protected $table = 'conceptos_correlativo';
	protected $arreglo = array();
	
	
	// Buscar
	public function busquedaCorrelativo() {
	
		$resultados =CorrelativoRepo::select('conceptos_correlativo.*')
		->get();
	
		foreach ($resultados as $filas){
			$this->arreglo = $filas;
		}
	
		return $this->arreglo;
	}
	
}
