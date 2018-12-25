<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class ProductType
 * @package App\Models
 */
class ProductType extends Model
{
    protected $fillable = [
        'name'
    ];

    public function product()
    {
        return $this->hasMany(Product::class);
    }

    public function productProps()
    {
        return $this->belongsTo(Props::class);
    }
}
