<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Status
 * @package App\Models
 */
class Status extends Model
{
    protected $fillable = [
        'name', 'sort', 'color'
    ];

    public function order()
    {
        return $this->belongsTo(Order::class);
    }
}
