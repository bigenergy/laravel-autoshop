<?php

namespace App\Repositories\Product;

use App\Models\Brand;
use App\Models\Category;
use App\Models\Product;
use App\Repositories\AbstractRepository;
use App\Repositories\Brand\BrandRepository;

class EloquentProductRepository extends AbstractRepository implements ProductRepository
{
    /**
     * @var Product
     */
    private $model;

    /**
     * EloquentProductRepository constructor.
     * @param Product $product
     */
    public function __construct(Product $product)
    {
        $this->model = $product;
        parent::__construct($product);
    }

    /**
     * @param array $relations
     * @return mixed
     */
    public function getAll($relations = [])
    {
        return $this->model->with($relations)->orderBy('sort')->get();
    }

    /**
     * @param array $relations
     * @param int $perPage
     * @return mixed
     */
    public function getPaginated($relations = [], $perPage = 15)
    {
        return $this->model->with($relations)->orderBy('sort')->paginate($perPage);
    }

    /**
     * Get all products from selected category
     * @param $product_type
     * @param $request
     * @param int $perPage
     * @return mixed
     */
    public function getByCategory($product_type, $request, $perPage = 15)
    {
        return $this->model->whereHas('categories', function ($q) use ($product_type, $request) {
            $q->where('type_id', $product_type)
                ->where('disable', 0)
                ->whereIn('category_id', $request->get('categories') ?? Category::all('id'))
                ->whereBetween('price', [$request->min_price ?? Product::min('price'), $request->max_price ?? Product::max('price')])
                ->whereIn('brand_id', $request->get('brands') ?? Brand::all('id'));
        })->orderBy($request->sort ?? 'sort', $request->sort_type ?? 'desc')->paginate($perPage);

    }

    /**
     * Get products from selected catalog page (type)
     * @param array $relations
     * @param string $slug
     * @return mixed
     */
    public function getBySlug($relations = [], string $slug)
    {
        return $this->model->with($relations)->where('slug', '=', $slug)->first();
    }

    /**
     * @param array $relations
     * @return Product[]|\Illuminate\Database\Eloquent\Builder[]|\Illuminate\Database\Eloquent\Collection|mixed
     */
    public function getNewAll($relations = [])
    {
        return $this->model->with($relations)->where('isNew', 1)->get();
    }
}