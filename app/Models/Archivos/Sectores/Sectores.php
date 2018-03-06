<?php

namespace App\Models\Archivos\Sectores;

use Illuminate\Database\Eloquent\Model;

class Sectores extends Model
{
   /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'sectores';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['codigo', 'haciendas_id', 'descripcion', 'created_at', 'updated_at'];
}
