<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Pages extends Model
{
    protected $fillable = [
        'id', 'title', 'slug', 'isPrivate', 'content'
    ];
}
