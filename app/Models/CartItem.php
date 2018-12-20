<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * @property mixed total_price
 * @property mixed product_id
 * @property mixed quantity
 * @property mixed price
 */
class CartItem extends Model
{
    protected $fillable = ['cart_id', 'product_id', 'quantity', 'price','total_price'];

    public function cart()
    {
        return $this->belongsTo(Cart::class);
    }

    public function product()
    {
        return $this->belongsTo(Product::class);
    }


}
