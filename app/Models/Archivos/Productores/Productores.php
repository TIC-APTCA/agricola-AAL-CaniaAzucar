<?php

namespace App\Models\Archivos\Productores;

use Illuminate\Database\Eloquent\Model;

class Productores extends Model
{
     /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'productores';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['cedula', 'nombres', 'apellidos', 'correo', 'telefono', 'created_at', 'updated_at'];
}
