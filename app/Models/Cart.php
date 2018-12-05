<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    protected $fillable = ['uuid', 'total_price'];

    protected $guarded = [];

    public function cartItems()
    {
        return $this->hasMany(CartItem::class);
    }
}
