<?php

namespace App\Models;

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Collection;

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


    public function getProductsCountAttribute()
    {
        return $this->orderItems->sum('quantity');
    }

    public function getProductsPriceAttribute()
    {
        return $this->orderItems->sum('total_price');
    }

    public function getFullNameAttribute()
    {
        return $this->second_name.' '.$this->first_name.' '.$this->middle_name;
    }

    public function addItems(Collection $items)
    {
        foreach ($items as $item) {
            $this->orderItems()->save($item);
        }

        $this->total_price = $items->sum('total_price');
        $this->push();

        return true;
    }

}
