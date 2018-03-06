<?php

namespace App\Models\Liquidacion\AnticipoSem;

use Illuminate\Database\Eloquent\Model;

class AnticipoSem extends Model
{
     /**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'anticipos_semanales';
	
	/**
	 * The attributes that are mass assignable.
	 *
	 * @var array
	 */
	protected $fillable = ['codigo', 'factor', 'descripcion', 'porcentaje', 'semana', 'fecha_inicial', 'fecha_final', 'updated_at'];
}
