<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Shipment extends Model
{
    public function paymentTransaction()
    {
        return $this->belongsTo(PaymentTransaction::class, 'id_transaccion');
    }

    public function service()
    {
        return $this->belongsTo(Service::class, 'id_servicio');
    }
}
