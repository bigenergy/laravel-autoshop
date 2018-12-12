<?php

namespace App\Repositories\Order;

use App\Models\Status;
use App\Repositories\AbstractRepository;

class EloquentOrderRepository extends AbstractRepository implements OrderRepository
{
    /**
     * @var Status
     */
    private $model;

    /**
     * EloquentProductRepository constructor.
     * @param Status $status
     */
    public function __construct(Status $status)
    {
        $this->model = $status;
        parent::__construct($status);
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