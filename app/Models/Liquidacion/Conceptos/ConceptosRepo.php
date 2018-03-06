<?php

namespace App\Models\Liquidacion\Conceptos;

use Illuminate\Database\Eloquent\Model;

class ConceptosRepo extends Model
{
/* The database table used by the model.
	*
	* @var string
	*/
	protected $table = 'liquidacion_conceptos';
	protected $arreglo = array();
	

	// Busqueda multicampo
	public function busquedaMulticampo($datos){
	
		if (empty($datos->multicampo)) {
			$resultados =ConceptosRepo::join('conceptos_tipos','conceptos_tipos.id','=','liquidacion_conceptos.tipos_id')
		    ->join('frecuencias','frecuencias.id','=','liquidacion_conceptos.frecuencias_id')
		    ->select('liquidacion_conceptos.*',
				 'conceptos_tipos.descripcion as tipo',
				 'frecuencias.descripcion as frecuencia')
			->orderBy('id','ASC')
			->paginate(9);
	
			return $resultados;
		}
		
	
		
		$resultados =ConceptosRepo::join('conceptos_tipos','conceptos_tipos.id','=','liquidacion_conceptos.tipos_id')
		->join('frecuencias','frecuencias.id','=','liquidacion_conceptos.frecuencias_id')
		->select('liquidacion_conceptos.*',
				 'conceptos_tipos.descripcion as tipo',
				 'frecuencias.descripcion as frecuencia')
		->orWhere('liquidacion_conceptos.codigo','like','%'.$datos->multicampo.'%')
		->orWhere('liquidacion_conceptos.descripcion','like','%'.$datos->multicampo.'%')
		->orWhere('conceptos_tipos.descripcion','like','%'.$datos->multicampo.'%')
		->orWhere('frecuencias.descripcion','like','%'.$datos->multicampo.'%')
		->orderBy('liquidacion_conceptos.id','ASC')
		->paginate(9);
		
		return $resultados;
	
	}
	
	
	// Buscar conceptos
	public function busquedaxId($id) {
	
		$resultados =ConceptosRepo::join('conceptos_tipos','conceptos_tipos.id','=','liquidacion_conceptos.tipos_id')
		->join('frecuencias','frecuencias.id','=','liquidacion_conceptos.frecuencias_id')
		->select('liquidacion_conceptos.*',
				 'conceptos_tipos.descripcion as tipo',
				 'frecuencias.descripcion as frecuencia')
		->Where('liquidacion_conceptos.id','=', $id)
		->get();
	
		foreach ($resultados as $filas){
			$this->arreglo = $filas;
		}
	
		return $this->arreglo;
	}
	
	
	
}