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
			$resultados = ZafrasRepo::select('zafras.*')
			->orderBy('zafras.id','ASC')
			->paginate(9);
	
			return $resultados;
		}
	
		$resultados = ZafrasRepo::select('zafras.*')
		->orWhere('zafras.codigo','like','%'.$datos->multicampo.'%')
		->orWhere('zafras.descripcion','like','%'.$datos->multicampo.'%')
		->orWhere('zafras.observaciones','like','%'.$datos->multicampo.'%')
		->orderBy('zafras.id','ASC')
		->paginate(9);
	
		return $resultados;
	}
	
	// Buscar 
	public function busquedaxCodigo($codigo) {
	
		$resultados = ZafrasRepo::select('zafras.*')
		->Where('zafras.codigo','=', $codigo)
		->get();
	
		foreach ($resultados as $filas){
			$this->arreglo = $filas;
		}
	
		return $this->arreglo;
	}
	
	public function generarCodigoxZafra() {
	
		if (ZafrasRepo::all()->count() == 0) {
			return 'Z' . str_pad(1, 3, 0, STR_PAD_LEFT) .'-'. date('Y');
		}
	
		return 'Z' . str_pad($this->getZafrasxAnio()->count() + 1, 3, 0, STR_PAD_LEFT) .'-'.date('Y');
	}
	
	public function getZafrasxAnio() {
		$resultados = ZafrasRepo::select('zafras.*')
		->whereRaw('YEAR(zafras.fecha_inicial) = '. date("Y"))
		->get();
		
		return $resultados;
	}
	
	
	
}
