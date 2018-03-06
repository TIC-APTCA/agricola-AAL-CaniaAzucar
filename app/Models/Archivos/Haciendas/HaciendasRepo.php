<?php

namespace App\Models\Archivos\Haciendas;

use Illuminate\Database\Eloquent\Model;

class HaciendasRepo extends Model
{
 /**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'haciendas';
	protected $arreglo = array();
	
// Busqueda multicampo
	public function busquedaMulticampo($datos){
	
		if (empty($datos->multicampo)) {
			$resultados =HaciendasRepo::join('zonas_geograficas', 'zonas_geograficas.id', '=', 'haciendas.zonas_id')
			->join('productores', 'productores.id', '=', 'haciendas.productores_id')
			->select('haciendas.*',
					'zonas_geograficas.descripcion as zona',
					'productores.id as productor',
					'productores.nombres as nombre',
					'productores.apellidos as apellido')
					//->groupBy('vehiculos.id')
					->orderBy('haciendas.id','ASC')
					->paginate(9);
	
			return $resultados;
		}
	
		$resultados =HaciendasRepo::join('zonas_geograficas', 'zonas_geograficas.id', '=', 'haciendas.zonas_id')
		->join('productores', 'productores.id', '=', 'haciendas.productores_id')
		->orWhere('haciendas.codigo','like','%'.$datos->multicampo.'%')
		->orWhere('haciendas.descripcion','like','%'.$datos->multicampo.'%')
		->orWhere('haciendas.direccion','like','%'.$datos->multicampo.'%')
		->orWhere('productores.cedula','like','%'.$datos->multicampo.'%')
		->orWhere('productores.nombres','like','%'.$datos->multicampo.'%')
		->orWhere('productores.apellidos','like','%'.$datos->multicampo.'%')
		->select('haciendas.*')
				//->groupBy('haciendas.id')
				->orderBy('haciendas.id','ASC')
				->paginate(9);
	
		return $resultados;
	}
	
// Buscar conductores
	public function busquedaxId($id) {
	
		$resultados =HaciendasRepo::join('zonas_geograficas', 'zonas_geograficas.id', '=', 'haciendas.zonas_id')
		->join('productores', 'productores.id', '=', 'haciendas.productores_id')
		->select('haciendas.*',
					'zonas_geograficas.descripcion as zona',
					'productores.id as productor',
					'productores.nombres as nombre',
					'productores.apellidos as apellido')
	    ->Where('haciendas.id','=', $id)
		->get();
	
		foreach ($resultados as $filas){
			$this->arreglo = $filas;
		}
	
		return $this->arreglo;
	}
}
