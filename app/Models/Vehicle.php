<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Vehicle extends Model
{
    protected $fillable= [
        'id_usuario',
        'placa',
        'tipo_vehiculo',
        'seguro_vig',
        'run_vig'
    ];
    public function service()
    {
        return $this->belongsTo(Service::class,'id_usuario');
    }
}
