<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    public function products()
    {
        return $this->belongsToMany(Product::class,'product_selects','id_carrito', 'id_producto')->withTimestamps();
    }

    public function paymentTransaction()
    {
        return $this->hasOne(PaymentTransaction::class,'id_carrito');
    }
}
