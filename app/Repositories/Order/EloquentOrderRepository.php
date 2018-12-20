<?php

namespace App\Repositories\Order;

use App\Models\Order;
use App\Models\Status;
use App\Repositories\AbstractRepository;

class EloquentOrderRepository extends AbstractRepository implements OrderRepository
{
    /**
     * @var Order
     */
    private $model;

    /**
     * EloquentProductRepository constructor.
     * @param Order $order
     */
    public function __construct(Order $order)
    {
        $this->model = $order;
        parent::__construct($order);
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

    public function getById2($relations = [], int $id)
    {
        return $this->model->with($relations)->find($id);
    }

    public function getOrderItems($id)
    {
        return $this->model
            ->where('id', $id)
            ->firstOrFail()
            ->orderItems;
    }
}