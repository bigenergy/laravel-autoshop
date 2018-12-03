<?php

namespace App\Repositories\Brand;

use App\Models\Brand;
use App\Repositories\AbstractRepository;

class EloquentBrandRepository extends AbstractRepository implements BrandRepository
{
    /**
     * @var Brand
     */
    private $model;

    /**
     * EloquentProductRepository constructor.
     * @param Brand $brand
     */
    public function __construct(Brand $brand)
    {
        $this->model = $brand;
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