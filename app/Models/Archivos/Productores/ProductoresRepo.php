<?php

namespace App\Models\Archivos\Productores;

use Illuminate\Database\Eloquent\Model;

class ProductoresRepo extends Model
{
/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'productores';
	protected $arreglo = array();
	
 // Busqueda multicampo

	public function busquedaMulticampo($datos){
	
		if (empty($datos->multicampo)) {
			$resultados =ProductoresRepo::select('productores.*')
			->orderBy('productores.id','ASC')
			->paginate(9);
	
			return $resultados;
		}
	
		$resultados =ProductoresRepo::select('productores.*')
		->orWhere('productores.cedula','like','%'.$datos->multicampo.'%')
		->orWhere('productores.nombres','like','%'.$datos->multicampo.'%')
		->orWhere('productores.apellidos','like','%'.$datos->multicampo.'%')
		->orWhere('productores.correo','like','%'.$datos->multicampo.'%')
		->orWhere('productores.telefono','like','%'.$datos->multicampo.'%')
		->orderBy('productores.id','ASC')
		->paginate(9);
	
		return $resultados;
	}
	
	public function busquedaxId($id) {
	
		$resultados =ProductoresRepo::select('productores.*')
		->Where('productores.id','=',$id)
		->get();
	
		foreach ($resultados as $filas){
			$this->arreglo = $filas;
		}
	
		return $this->arreglo;
	}
}
