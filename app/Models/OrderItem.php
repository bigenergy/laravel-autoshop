<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * @property int|string product_id
 * @property mixed quantity
 * @property float|int total_price
 * @property |null price
 * @property mixed|null price
 */
class OrderItem extends Model
{
    protected $fillable = [
        'order_id',
        'product_id',
        'price',
        'total_price',
        'quantity',
    ];

    public function order()
    {
        return $this->belongsTo(Order::class);
    }

    public function product()
    {
        return $this->belongsTo(Product::class);
    }
}
