<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Status extends Model
{
    protected $fillable = [
        'name', 'sort'
    ];

    public function order()
    {
        return $this->belongsTo(Order::class);
    }
}
