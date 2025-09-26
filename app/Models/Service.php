<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    protected $fillable = [
        'id_usuario',
        'estado_dispo'
    ];

    public function vehicles ()
    {
        return $this->hasMany(Vehicle::class,'id_usuario');
    }

    public function shipments()
    {
        return $this->hasMany(Shipment::class, 'id_servicio');
    }

    public function user(){
        return $this->belongsTo(User::class, 'id_usuario');
    }
}
