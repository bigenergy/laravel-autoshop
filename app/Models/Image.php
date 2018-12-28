<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Image
 * @package App\Models
 */
class Image extends Model
{
    protected $fillable = [
        'path', 'name', 'imageable_type', 'imageable_id',
    ];

    public function imageable()
    {
        return $this->morphTo();
    }

    public function getFullUrlAttribute()
    {
        return '/storage/' . $this->path . '/' . $this->name;
    }
}
