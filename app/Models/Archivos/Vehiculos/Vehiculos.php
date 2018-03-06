<?php


namespace App\Models\Archivos\Vehiculos;
use Illuminate\Database\Eloquent\Model;



class Vehiculos extends Model 
{
    /**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'vehiculos';
	
	/**
	 * The attributes that are mass assignable.
	 *
	 * @var array
	 */
	protected $fillable = ['placa', 'vehiculos_tipos_id', 'vehiculos_marcas_id', 'vehiculos_modelos_id', 'remolque', 'placa_remolque','descripcion_remolque', 'created_at', 'updated_at'];

}

