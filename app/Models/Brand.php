<?php

namespace App\Models;

use App\Http\Traits\HasImages;
use Illuminate\Database\Eloquent\Model;

class Brand extends Model
{
    use HasImages;

    protected $fillable = [
        'id', 'name', 'description', 'disable',
    ];

    public function product()
    {
        return $this->belongsTo(Product::class, 'id', 'brand_id');
    }

    public function images()
    {
        return $this->morphMany(Image::class, 'imageable');
    }
}