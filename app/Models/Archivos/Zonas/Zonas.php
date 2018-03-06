<?php

namespace App\Models\Archivos\Zonas;

use Illuminate\Database\Eloquent\Model;

class Zonas extends Model
{
	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'zonas_geograficas';
	
	/**
	 * The attributes that are mass assignable.
	 *
	 * @var array
	 */
	protected $fillable = ['codigo', 'descripcion', 'estados_id', 'created_at', 'updated_at'];
}
