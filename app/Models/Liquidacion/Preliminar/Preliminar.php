<?php

namespace App\Models\Liquidacion\Preliminar;

use Illuminate\Database\Eloquent\Model;

class Preliminar extends Model
{
 /**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'preliminar';
	
	/**
	 * The attributes that are mass assignable.
	 *
	 * @var array
	 */
	protected $fillable = ['fecha', 'peso_neto', 'peso_bruto', 'peso_tara', 'cana', 'rendimiento', 'azucar','created_at', 'updated_at'];
	
}
