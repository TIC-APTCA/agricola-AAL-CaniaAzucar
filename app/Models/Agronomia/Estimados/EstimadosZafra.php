<?php

namespace App\Models\Agronomia\Estimados;

use Illuminate\Database\Eloquent\Model;

class EstimadosZafra extends Model
{
	/**The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'estimados_zafra';
	
	/**
	 * The attributes that are mass assignable.
	 *
	 * @var array
	 */
	protected $fillable = ['zafras_id','fecha_inicial', 'fecha_final', 'rendimiento', 'cana', 'azucar','created_at', 'updated_at'];
}
