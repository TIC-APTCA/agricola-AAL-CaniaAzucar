<?php

namespace App\Models\Archivos\Zafras;

use Illuminate\Database\Eloquent\Model;

class Zafras extends Model
{
     /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'zafras';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['codigo', 'status', 'descripcion', 'fecha_inicial', 'fecha_final','observaciones', 'created_at', 'updated_at'];
}
