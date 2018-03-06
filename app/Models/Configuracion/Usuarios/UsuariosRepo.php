<?php

namespace App\Models\Usuarios;

use Illuminate\Database\Eloquent\Model;

class UsuariosRepo extends Model
{
	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'usuarios';
	
	// Busqueda Multicampo
	public function busquedaMulticampo($datos){
	
		if (empty($datos->multicampo)) {
			$resultados = UsuariosRepo::join('usuarios_tipos', 'usuarios.usuarios_tipos_id', '=', 'usuarios_tipos.id')
			->select('usuarios.*',
					'usuarios_tipos.nombre as usuarios_tipos_n')
					->orderBy('usuarios.id','ASC')
					->paginate(15);
				
			return $resultados;
		}
	
		$resultados = UsuariosRepo::join('usuarios_tipos', 'usuarios.usuarios_tipos_id', '=', 'usuarios_tipos.id')
		->orWhere('usuarios.cedula','like','%'.$datos->multicampo.'%')
		->orWhere('usuarios.nombres','like','%'.$datos->multicampo.'%')
		->orWhere('usuarios.apellidos','like','%'.$datos->multicampo.'%')
		->orWhere('usuarios.email','like','%'.$datos->multicampo.'%')
		->orWhere('usuarios_tipos.nombre','like','%'.$datos->multicampo.'%')
		->select('usuarios.*',
				'usuarios_tipos.nombre as usuarios_tipos_n')
				->orderBy('usuarios.id','ASC')
				->paginate(15);
			
		return $resultados;
	}
	
	// Obtener datos de usuario por id
	public function getUsuarioxId($id) {
		$resultados = UsuariosRepo::join('usuarios_tipos', 'usuarios.usuarios_tipos_id', '=', 'usuarios_tipos.id')
		->where('usuarios.id', '=', $id)
		->select('usuarios.*',
				'usuarios_tipos.nombre as usuarios_tipos_n')
		->get();
			
		foreach ($resultados as $filas){
			$this->arreglo = $filas;
		}
		return $this->arreglo;
	}
	
	// Obtener datos de usuario por campo email
	public function getUsuarioxEmail($email) {
		$resultados = UsuariosRepo::where('usuarios.email', '=', $email)->get();
		 
		foreach ($resultados as $filas){
			$this->arreglo = $filas;
		}
		return $this->arreglo;
	}
	
	// Obtener datos de usuario por campo cedula
	public function getUsuarioxCedula($cedula) {
		$resultados = UsuariosRepo::where('usuarios.cedula', '=', $cedula)->get();
	
		foreach ($resultados as $filas){
			$this->arreglo = $filas;
		}
		return $this->arreglo;
	}
}
