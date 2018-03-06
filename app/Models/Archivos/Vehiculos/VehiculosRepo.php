<?php

namespace App\Models\Archivos\Vehiculos;

use Illuminate\Database\Eloquent\Model;

class VehiculosRepo extends Model
{
    /**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'vehiculos';
	protected $arreglo = array();
	
// Busqueda multicampo
	public function busquedaMulticampo($datos){
	
		if (empty($datos->multicampo)) {
			$resultados =VehiculosRepo::join('vehiculos_tipos', 'vehiculos_tipos.id', '=', 'vehiculos.vehiculos_tipos_id')
			->join('vehiculos_marcas', 'vehiculos_marcas.id', '=', 'vehiculos.vehiculos_marcas_id')
			->join('vehiculos_modelos', 'vehiculos_modelos.id', '=', 'vehiculos.vehiculos_modelos_id')
			->select('vehiculos.*',
					'vehiculos_tipos.descripcion as tipo',
					'vehiculos_marcas.descripcion as marca',
					'vehiculos_modelos.descripcion as modelo')
					->groupBy('vehiculos.id')
					->orderBy('vehiculos.id','ASC')
					->paginate(9);
	
			return $resultados;
		}
	
		$resultados =VehiculosRepo::join('vehiculos_tipos', 'vehiculos_tipos.id', '=', 'vehiculos.vehiculos_tipos_id')
		->join('vehiculos_marcas', 'vehiculos_marcas.id', '=', 'vehiculos.vehiculos_marcas_id')
		->join('vehiculos_modelos', 'vehiculos_modelos.id', '=', 'vehiculos.vehiculos_modelos_id')
		->orWhere('vehiculos.placa','like','%'.$datos->multicampo.'%')
		->orWhere('vehiculos_tipos.descripcion','like','%'.$datos->multicampo.'%')
		->orWhere('vehiculos_marcas.descripcion','like','%'.$datos->multicampo.'%')
		->orWhere('vehiculos_modelos.descripcion','like','%'.$datos->multicampo.'%')
		->select('vehiculos.*',
				'vehiculos_tipos.descripcion as tipo',
				'vehiculos_marcas.descripcion as marca',
				'vehiculos_modelos.descripcion as modelo')
				->groupBy('vehiculos.id')
				->orderBy('vehiculos.id','ASC')
				->paginate(9);
	
		return $resultados;
	}
	
	// Buscar conductores
	public function busquedaxId($id) {
		
		
	
		$resultados =VehiculosRepo::join('vehiculos_tipos', 'vehiculos_tipos.id', '=', 'vehiculos.vehiculos_tipos_id')
		->join('vehiculos_marcas', 'vehiculos_marcas.id', '=', 'vehiculos.vehiculos_marcas_id')
		->join('vehiculos_modelos', 'vehiculos_modelos.id', '=', 'vehiculos.vehiculos_modelos_id')
		->select('vehiculos.*',
		'vehiculos_tipos.descripcion as tipo',
		'vehiculos_marcas.descripcion as marca',
		'vehiculos_modelos.descripcion as modelo')
		->Where('vehiculos.id','=', $id)
		->get();
	
		foreach ($resultados as $filas){
			$this->arreglo = $filas;
		}
	
		return $this->arreglo;
	}
	
}
