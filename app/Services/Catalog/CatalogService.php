<?php
namespace App\Services\Catalog;

use App\Models\Product;

class CatalogService
{

    private $builder;

    /**
     * CatalogService constructor.
     * @param Product $product
     */
    public function __construct(Product $product)
    {
        $this->builder = $product->newQuery();
    }

    /**
     * @param array $filters
     * @return \Illuminate\Database\Eloquent\Builder[]|\Illuminate\Database\Eloquent\Collection
     */
    public function getProducts(array $filters)
    {

        foreach ($filters as $name => $value) {
            if (! method_exists($this, $name)) {
                continue;
            }

            if (is_array($value) || strlen($value)) {
                $this->$name($value);
            }
        }
        return $this->builder->get();

    }

    public function price($price)
    {
        $this->builder->whereBetween('price',  [$price['from'], $price['to']]);
    }

    public function product_type($productType)
    {
        $this->builder->whereHas('productType', function ($query) use ($productType) {
            $query->where('slug', $productType);
        });
    }

    public function category($category)
    {
        $this->builder->whereHas('categories', function ($query) use ($category) {
            $query->whereIn('categories.id', $category);
        });
    }

    public function sort($sort)
    {
        $this->builder->orderBy($sort['column'], $sort['order']);
    }

    public function brand($brand)
    {
        $this->builder->whereIn('brand_id', $brand);
    }

    public function prop($prop)
    {
        $this->builder->whereHas('props', function ($query) use ($prop){
            $query->whereIn('value', $prop);
        });
    }

}