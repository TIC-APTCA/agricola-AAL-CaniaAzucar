<?php

namespace App\Models\Archivos\Zonas;

use Illuminate\Database\Eloquent\Model;

class ZonasRepo extends Model
{
 /**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'zonas_geograficas';
	protected $arreglo = array();
	
// Busqueda multicampo
	// Busqueda multicampo
	public function busquedaMulticampo($datos){
	
		if (empty($datos->multicampo)) {
			$resultados =ZonasRepo::join('estados', 'estados.id', '=', 'zonas_geograficas.estados_id')
			->select('zonas_geograficas.*','estados.descripcion as estado')
			->orderBy('zonas_geograficas.id','ASC')
			->paginate(9);
	
			return $resultados;
		}
	
		$resultados =ZonasRepo::join('estados', 'estados.id', '=', 'zonas_geograficas.estados_id')
		->select('zonas_geograficas.*','estados.descripcion as estado')
		->orWhere('zonas_geograficas.descripcion','like','%'.$datos->multicampo.'%')
		->orWhere('estados.descripcion','like','%'.$datos->multicampo.'%')
		->orWhere('zonas_geograficas.codigo','like','%'.$datos->multicampo.'%')
		->orderBy('zonas_geograficas.id','ASC')
		->paginate(9);
	
		return $resultados;
	}
	
	// Buscar conductores
	public function busquedaxId($id) {
	
		$resultados =ZonasRepo::join('estados', 'estados.id', '=', 'zonas_geograficas.estados_id')
		->select('zonas_geograficas.*','estados.descripcion as estado')
	    ->Where('zonas_geograficas.id','=', $id)
		->get();
	
		foreach ($resultados as $filas){
			$this->arreglo = $filas;
		}
	
		return $this->arreglo;
	}
	
	

}
