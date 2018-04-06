<?php

namespace App\Models\Liquidacion\AnticipoSem;

use Illuminate\Database\Eloquent\Model;

class AnticipoSemRepo extends Model
{
	
	
	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'anticipos_semanales';
	protected $arreglo = array();
	
	// Busqueda Multicampo
	public function busquedaMulticampo($datos){
	
		if (empty($datos->multicampo)) {
			$resultados =AnticipoSemRepo::select('anticipos_semanales.*')
					->orderBy('anticipos_semanales.id','ASC')
					->paginate(9);
	
			return $resultados;
		}
	
		$resultados =AnticipoSemRepo::select('anticipos_semanales.*')
		->orWhere('anticipos_semanales.codigo','like','%'.$datos->multicampo.'%')
		->orWhere('anticipos_semanales.porcentaje','like','%'.$datos->multicampo.'%')
		->orWhere('anticipos_semanales.semana','like','%'.$datos->multicampo.'%')
		->orWhere('anticipos_semanales.fecha_inicial','like','%'.$datos->multicampo.'%')
		->orWhere('anticipos_semanales.fecha_final','like','%'.$datos->multicampo.'%')
		->orWhere('anticipos_semanales.factor','like','%'.$datos->multicampo.'%')
				->orderBy('anticipos_semanales.id','ASC')
				->paginate(9);
	
		return $resultados;
}

// Buscar conductores
public function busquedaxId($id) {

		$resultados =AnticipoSemRepo::select('anticipos_semanales.*')
		->Where('anticipos_semanales.id','=', $id)
		->get();
	
		foreach ($resultados as $filas){
			$this->arreglo = $filas;
		}

	return $this->arreglo;
}



}