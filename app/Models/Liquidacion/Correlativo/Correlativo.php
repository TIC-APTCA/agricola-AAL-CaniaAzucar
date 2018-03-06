<?php

namespace App\Models\Liquidacion\Correlativo;

use Illuminate\Database\Eloquent\Model;

class Correlativo extends Model
{
     /**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'conceptos_correlativo';
	
	/**
	 * The attributes that are mass assignable.
	 *
	 * @var array
	 */
	protected $fillable = ['id', 'asignacion', 'deduccion','created_at', 'updated_at'];
}

