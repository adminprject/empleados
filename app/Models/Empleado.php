<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Empleado extends Model
{
    protected $table = 'empleados';
    protected $fillable = [
        'nombre', 'email','sexo','area_id','boletin','descripcion',
    ];

    public $timestamps = true;

    public function Area(){
        return $this->belongsTo('App\Models\Area');
    }
}
