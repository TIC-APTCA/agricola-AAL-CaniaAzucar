<?php

namespace App\Models\Archivos\Conductores;

use Illuminate\Database\Eloquent\Model;

class Conductores extends Model
{
	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'conductores';
	
	/**
	 * The attributes that are mass assignable.
	 *
	 * @var array
	 */
	protected $fillable = ['cedula', 'nombres', 'apellidos', 'telefono', 'remember_token','created_at', 'updated_at'];
	
	
}
