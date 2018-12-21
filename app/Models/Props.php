<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Props extends Model
{
    protected $fillable = [
        'name', 'product_type_id'
    ];
}
