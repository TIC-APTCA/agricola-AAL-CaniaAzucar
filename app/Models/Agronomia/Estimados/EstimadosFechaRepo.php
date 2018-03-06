<?php

namespace App\Models\Agronomia\Estimados;

use Illuminate\Database\Eloquent\Model;

class EstimadosFechaRepo extends Model
{
/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'estimados_fecha';
	protected $arreglo = array();
	
	public function busquedaFecha($datos){
	
		if (empty($datos->fecha_inicial || $datos->fecha_final )) {
			$resultados =EstimadosFechaRepo::select('estimados_fecha.*')
					->orderBy('estimados_fecha.id','ASC')
					->paginate(9);
	
			return $resultados;
		}
	
		$resultados =EstimadosFechaRepo::select('estimados_fecha.*')
		->orWhere('estimados_fecha.fecha_inicial','=',$datos->fecha_inicial)
		->orWhere('estimados_fecha.fecha_final','=',$datos->fecha_final)
				->orderBy('estimados_fecha.id','ASC')
				->paginate(9);
	
		return $resultados;
	}
	

	public function busquedaxCodigo($id) {
	
		$resultados =EstimadosFechaRepo::select('estimados_fecha.*')
		->Where('estimados_fecha.id','=', $id)
		->get();
	
		foreach ($resultados as $filas){
			$this->arreglo = $filas;
		}
	
		return $this->arreglo;
	}
	
}
