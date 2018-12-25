<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class PropsProduct
 * @package App\Models
 */
class PropsProduct extends Model
{
    protected $fillable = [
        'prop_id', 'product_id', 'value'
    ];
}
