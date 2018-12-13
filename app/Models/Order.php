<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $fillable = [
        'number',
        'status_id',
        'name',
        'surname',
        'patronymic',
        'tel',
        'country',
        'city',
        'street',
        'house',
        'apartment',
        'email'
    ];

    /**
     * Returns cart items relation
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function orderItems()
    {
        return $this->hasMany(OrderItem::class);
    }

    public function status()
    {
        return $this->belongsTo(Status::class);
    }

}
