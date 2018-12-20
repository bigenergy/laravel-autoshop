<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * @property mixed cartItems
 */
class Cart extends Model
{
    protected $fillable = [
        'uuid',
        'total_price'
    ];

    /**
     * Returns cart items relation
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function cartItems()
    {
        return $this->hasMany(CartItem::class);
    }

}
