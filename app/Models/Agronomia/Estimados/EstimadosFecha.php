<?php

namespace App\Models\Agronomia\Estimados;

use Illuminate\Database\Eloquent\Model;

class EstimadosFecha extends Model
{
    /**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'estimados_fecha';
	
	/**
	 * The attributes that are mass assignable.
	 *
	 * @var array
	 */
	protected $fillable = ['fecha_inicial', 'fecha_final', 'rendimiento', 'cana', 'azucar','created_at', 'updated_at'];
}
