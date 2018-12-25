<?php

namespace App\Models;

use App\Http\Traits\HasImages;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Product
 * @package App\Models
 * @property int $id
 */
class Product extends Model
{
    use HasImages;

    private $imagesPath = 'products';

    protected $fillable = [
        'name', 'description', 'disable', 'brand_id', 'sort', 'price', 'slug', 'type_id'
    ];

    protected $guarded = [];

    /*
    |------------------------------------------------------------------------—
    | RELATIONS
    |------------------------------------------------------------------------—
    */
    /**
     * Product Category relation
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function categories()
    {
        return $this->belongsToMany(Category::class);
    }

    /**
     * Product Brand relation
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function brand()
    {
        return $this->belongsTo(Brand::class);
    }

    /**
     * Product type relation to ProductType
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function productType()
    {
        return $this->belongsTo(ProductType::class, 'type_id', 'id');
    }

    /**
     * Product properties relation
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function props()
    {
        return $this
            ->belongsToMany(Props::class, 'props_products', 'product_id', 'prop_id')
            ->withPivot('value');
    }

    /*
    |------------------------------------------------------------------------—
    | FUNCTIONS
    |------------------------------------------------------------------------—
    */
    /**
     * Sync product categories
     *
     * @param array $categories
     * @return array
     */
    public function syncCategories(array $categories)
    {
       return $this->categories()->sync($categories);
    }

    /**
     * Sync product props
     *
     * @param array $props
     * @return array
     */
    public function syncProps(array $props)
    {
        return $this->props()->sync($props);
    }
}
