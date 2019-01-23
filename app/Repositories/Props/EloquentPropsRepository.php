<?php

namespace App\Repositories\Props;

use App\Models\Props;
use App\Repositories\AbstractRepository;

class EloquentPropsRepository extends AbstractRepository implements PropsRepository
{
    /**
     * @var Props
     */
    private $model;

    /**
     * EloquentProductRepository constructor.
     * @param Props $props
     */
    public function __construct(Props $props)
    {
        $this->model = $props;
        parent::__construct($props);
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
     * @param int $id
     * @return Props|\Illuminate\Database\Eloquent\Builder|mixed
     */
    public function getByTypeId(int $id)
    {
        return $this->model
            ->newQuery()
            ->where('product_type_id', $id)
            ->get();
    }

    /**
     * @param array $relations
     * @param $productType
     * @return Props[]|\Illuminate\Database\Eloquent\Builder[]|\Illuminate\Database\Eloquent\Collection
     */
    public function getFilterProps($relations = [], $productType)
    {
        return $this->model->with($relations)
            ->where('is_enabled', 0)
            ->where('product_type_id', $productType)
            ->whereHas('propValue', function ($query) {
                $query->groupBy('value');
            })->get();
    }

}