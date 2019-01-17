<?php

namespace App\Repositories\ProductType;

use App\Models\ProductType;
use App\Repositories\AbstractRepository;

class EloquentProductTypeRepository extends AbstractRepository implements ProductTypeRepository
{
    /**
     * @var ProductType
     */
    private $model;

    /**
     * EloquentProductRepository constructor.
     * @param ProductType $productType
     */
    public function __construct(ProductType $productType)
    {
        $this->model = $productType;
        parent::__construct($productType);
    }

    /**
     * @param array $relations
     * @return mixed
     */
    public function getAll($relations = [])
    {
        return $this->model->with($relations)->get();
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

    /**
     * @param string $slug
     * @return mixed
     */
    public function getBySlug(string $slug)
    {
        return $this->model->with([])->where('slug', '=', $slug)->first();
    }
}