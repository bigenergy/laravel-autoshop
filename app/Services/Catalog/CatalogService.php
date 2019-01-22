<?php
namespace App\Services\Catalog;

use App\Models\Product;

class CatalogService
{
    /**
     * @var \Illuminate\Database\Eloquent\Builder
     */
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

    public function page($page)
    {
        $this->builder->paginate(2, null, null, $page);
    }

    /**
     * Filter by price
     * @param $price
     */

    public function price($price)
    {
        $this->builder->whereBetween('price',  [$price['from'], $price['to']]);
    }

    /**
     * Filter by ProductType
     * @param $productType
     */
    public function product_type($productType)
    {
        $this->builder->whereHas('productType', function ($query) use ($productType) {
            $query->where('slug', $productType);
        });
    }

    /**
     * Filter by Categories
     * @param $category
     */
    public function category($category)
    {
        $this->builder->whereHas('categories', function ($query) use ($category) {
            $query->whereIn('categories.id', $category);
        });
    }

    /**
     * Sorting filter
     * @param $sort
     */
    public function sort($sort)
    {
        $this->builder->orderBy($sort['column'], $sort['order']);
    }

    /**
     * Filter by Brands
     * @param $brand
     */
    public function brand($brand)
    {
        $this->builder->whereIn('brand_id', $brand);
    }

    /**
     * Filter by Properties
     * @param $prop
     */
    public function prop($prop)
    {
        $this->builder->whereHas('props', function ($query) use ($prop){
            $query->whereIn('value', $prop);
        });
    }

}