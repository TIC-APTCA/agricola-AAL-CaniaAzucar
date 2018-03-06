<?php

namespace App\Models\Agronomia\Estimados;

use Illuminate\Database\Eloquent\Model;

class EstimadosZafraRepo extends Model
{
/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'estimados_zafra';
	protected $arreglo = array();
	
 // Busqueda multicampo

	public function busquedaMulticampo($datos){
	
		if (empty($datos->multicampo)) {
			$resultados=EstimadosZafraRepo::join('zafras', 'zafras.id', '=', 'estimados_zafra.zafras_id')
		    ->select('estimados_zafra.*','zafras.*')
			->orderBy('estimados_zafra.id','ASC')
			->paginate(9);
	
			return $resultados;
		}
	
		$resultados =EstimadosZafraRepo::join('zafras', 'zafras.id', '=', 'estimados_zafra.zafras_id')
		->select('estimados_zafra.*','zafras.*')
		->orWhere('estimados_zafra.zafras_id','like','%'.$datos->multicampo.'%')
		->orWhere('zafras.codigo','like','%'.$datos->multicampo.'%')
		->orderBy('estimados_zafra.id','ASC')
		->paginate(9);
	
		return $resultados;
	}
	
	// Buscar 
	public function busquedaxId($codigo) {
	
		$resultados =EstimadosZafraRepo::join('zafras', 'zafras.id', '=', 'estimados_zafra.zafras_id')
		->select('estimados_zafra.*','zafras.*')
		->orWhere('zafras.id','=',$codigo)
		->get();
	
		foreach ($resultados as $filas){
			$this->arreglo = $filas;
		}
	
		return $this->arreglo;
	}
}
