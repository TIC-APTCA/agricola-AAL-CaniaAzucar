<?php

namespace App\Models\Liquidacion\Conceptos;

use Illuminate\Database\Eloquent\Model;

class Conceptos extends Model
{
     /**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'liquidacion_conceptos';
	
	/**
	 * The attributes that are mass assignable.
	 *
	 * @var array
	 */
	protected $fillable = ['tipos_id', 'codigo', 'descripcion', 'frecuencias_id','created_at', 'updated_at'];
}
