<?php

namespace App\Repositories\Product;

use App\Models\Product;
use App\Repositories\AbstractRepository;

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
        return $this->model->with($relations)->orderBy('created_at', 'desc')->paginate($perPage);
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