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

    public function categories()
    {
        return $this->belongsToMany(Category::class);
    }

    public function brand()
    {
        return $this->belongsTo(Brand::class);
    }

    public function images()
    {
        return $this->morphMany(Image::class, 'imageable');
    }

    /**
     * Product Cart relation
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function cart()
    {
        return $this->belongsToMany(Cart::class);
    }

    /**
     * Product Cart Items relation
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function cartItems()
    {
        return $this->hasMany(CartItem::class);
    }

    /**
     * Product type relation to ProductType
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function productType()
    {
        return $this->belongsTo(ProductType::class, 'type_id', 'id');
    }

    public function props()
    {
        return $this->belongsTo(Props::class);
    }
}
