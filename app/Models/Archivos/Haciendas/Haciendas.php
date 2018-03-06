<?php

namespace App\Models\Archivos\Haciendas;

use Illuminate\Database\Eloquent\Model;

class Haciendas extends Model
{
/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'haciendas';
	
	/**
	 * The attributes that are mass assignable.
	 *
	 * @var array
	 */
	protected $fillable = ['codigo','productores_id', 'zonas_id', 'telefono', 'descripcion', 'direccion','created_at', 'updated_at'];
	
	
}
