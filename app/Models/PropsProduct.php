<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PropsProduct extends Model
{
    protected $fillable = [
        'prop_id', 'product_id', 'value'
    ];
}
