<?php

namespace App\Models\Archivos\Zafras;

use Illuminate\Database\Eloquent\Model;

class ZafrasRepo extends Model
{
   /**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'zafras';
	protected $arreglo = array();
	
 // Busqueda multicampo

	public function busquedaMulticampo($datos){
	
		if (empty($datos->multicampo)) {
			$resultados =ZafrasRepo::select('zafras.*')
			->orderBy('zafras.id','ASC')
			->paginate(9);
	
			return $resultados;
		}
	
		$resultados =ZafrasRepo::select('zafras.*')
		->orWhere('zafras.codigo','like','%'.$datos->multicampo.'%')
		->orWhere('zafras.descripcion','like','%'.$datos->multicampo.'%')
		->orWhere('zafras.observaciones','like','%'.$datos->multicampo.'%')
		->orderBy('zafras.id','ASC')
		->paginate(9);
	
		return $resultados;
	}
	
	// Buscar 
	public function busquedaxCodigo($codigo) {
	
		$resultados =ZafrasRepo::select('zafras.*')
		->Where('zafras.codigo','=', $codigo)
		->get();
	
		foreach ($resultados as $filas){
			$this->arreglo = $filas;
		}
	
		return $this->arreglo;
	}
	
	
	
}
