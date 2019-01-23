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
        parent::__construct($brand);
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
        return $this->model->with($relations)->orderBy('created_at', 'desc')->paginate($perPage);
    }

    /**
     * @param array $relations
     * @param $currentType
     * @return \Illuminate\Database\Eloquent\Builder[]|\Illuminate\Database\Eloquent\Collection
     */
    public function getAllWithCount($relations = [], $currentType) {
        return $this->model
            ->whereHas('product', function ($q) use ($currentType) {
                $q->where('type_id', $currentType ?? Brand::all());
            })
            ->withCount($relations)
            ->get();
    }

}