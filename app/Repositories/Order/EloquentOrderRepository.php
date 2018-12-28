<?php

namespace App\Repositories\Order;

use App\Models\Order;
use App\Repositories\AbstractRepository;
use Illuminate\Support\Collection;

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
        return $this->model->with($relations)->orderBy('created_at', 'desc')->get();
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
     * @param $id
     * @return mixed
     */
    public function getOrderItems(int $id): Collection
    {
        return $this->model
            ->where('id', $id)
            ->firstOrFail()
            ->orderItems;
    }
}