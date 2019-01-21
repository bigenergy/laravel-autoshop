<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Props
 * @package App\Models
 */
class Props extends Model
{
    protected $fillable = [
        'name',
        'product_type_id',
        'is_enabled',
        'sort'
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function product()
    {
        return $this->hasMany(ProductType::class, 'id', 'product_type_id');
    }

    public function propValue()
    {
        return $this->hasMany(PropsProduct::class, 'prop_id');
    }

}
