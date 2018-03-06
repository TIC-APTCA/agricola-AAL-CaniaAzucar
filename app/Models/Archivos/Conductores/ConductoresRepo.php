<?php

namespace App\Models\Archivos\Conductores;

use Illuminate\Database\Eloquent\Model;

class ConductoresRepo extends Model
{
 /**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'conductores';
	protected $arreglo = array();
	
// Busqueda multicampo
	// Busqueda multicampo
	public function busquedaMulticampo($datos){
	
		if (empty($datos->multicampo)) {
			$resultados =ConductoresRepo::select('conductores.*')
					->orderBy('conductores.id','ASC')
					->paginate(9);
	
			return $resultados;
		}
	
		$resultados =ConductoresRepo::select('conductores.*')
		->orWhere('conductores.cedula','like','%'.$datos->multicampo.'%')
		->orWhere('conductores.nombres','like','%'.$datos->multicampo.'%')
		->orWhere('conductores.apellidos','like','%'.$datos->multicampo.'%')
		->orWhere('conductores.telefono','like','%'.$datos->multicampo.'%')
				->orderBy('conductores.id','ASC')
				->paginate(9);
	
		return $resultados;
	}
	
	// Buscar conductores
	public function busquedaxId($id) {
	
		$resultados =ConductoresRepo::select('conductores.*')
				    ->Where('conductores.id','=', $id)
					->get();
	
		foreach ($resultados as $filas){
			$this->arreglo = $filas;
		}
	
		return $this->arreglo;
	}
	
	// Buscar conductores
	public function busquedalastid() {
	
		$resultados =ConductoresRepo::select('conductores.*')
		->orderBy('conductores.id','ASC')
		->get();
	
		foreach ($resultados as $filas){
			$this->arreglo = $filas;
		}
	
		return $this->arreglo;
	}
	

}
