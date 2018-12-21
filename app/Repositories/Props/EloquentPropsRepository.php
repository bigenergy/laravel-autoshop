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