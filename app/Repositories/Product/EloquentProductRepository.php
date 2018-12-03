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
        return $this->model->with($relations)->all();
    }

    /**
     * @param array $relations
     * @param int $perPage
     * @return mixed
     */
    public function getPaginated($relations = [], $perPage = 15)
    {
        return $this->model->with($relations)->paginate($perPage);
    }


}