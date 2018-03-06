<?php

namespace App\Models\Archivos\Sectores;


use Illuminate\Database\Eloquent\Model;

class SectoresRepo extends Model
{
/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'sectores';
	protected $arreglo = array();
	
 // Busqueda multicampo

	public function busquedaMulticampo($datos){
	
		if (empty($datos->multicampo)) {
			$resultados = SectoresRepo::join('haciendas', 'haciendas.id', '=', 'sectores.haciendas_id')
			->join('zonas_geograficas', 'zonas_geograficas.id', '=', 'haciendas.zonas_id')
			->join('productores', 'productores.id', '=', 'haciendas.productores_id')
			->select('sectores.*',
					'haciendas.codigo as haciendas',
					'zonas_geograficas.codigo as zonas',
					'zonas_geograficas.descripcion as zona')
					->orderBy('sectores.id','ASC')
					->paginate(9);
	
			return $resultados;
		}
	
		$resultados =SectoresRepo::join('haciendas', 'haciendas.id', '=', 'sectores.haciendas_id')
			->join('zonas_geograficas', 'zonas_geograficas.id', '=', 'haciendas.zonas_id')
			->join('productores', 'productores.id', '=', 'haciendas.productores_id')
		->select('sectores.*')
		->orWhere('sectores.descripcion','like','%'.$datos->multicampo.'%')
		->orWhere('sectores.codigo','like','%'.$datos->multicampo.'%')
		->orderBy('productores.id','ASC')
		->paginate(9);
	
		return $resultados;
	}
	
	public function busquedaxId($id) {
	
		$resultados =SectoresRepo::select('sectores.*')
		->Where('sectores.id','=',$id)
		->get();
	
		foreach ($resultados as $filas){
			$this->arreglo = $filas;
		}
	
		return $this->arreglo;
	}
	
	public function busquedaxHacienda($id) {
	
		$resultados =SectoresRepo::select('sectores.*')
		->Where('sectores.haciendas_id','=',$id)
		->get();
	
		return $resultados;
	}
}
