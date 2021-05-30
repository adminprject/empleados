<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class EmpleadoRol extends Model
{
    protected $table = 'empleado_rol';
    protected $fillable = [
        'empleado_id', 'rol_id',
    ];
}
