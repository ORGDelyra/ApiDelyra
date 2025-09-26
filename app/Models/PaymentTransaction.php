<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PaymentTransaction extends Model
{
    public function cart()
    {
        return $this->belongsTo(Cart::class, 'id_carrito');
    }

    public function shipment()
    {
        return $this->hasOne(Shipment::class,'id_transaccion');
    }
}
