<?php

namespace App\Services\Order;


use App\Models\Order;
use App\Models\Status;
use App\Repositories\Order\OrderRepository;
use App\Repositories\Status\StatusRepository;

class OrderService
{
    /**
     * @var Order
     */
    private $orderModel;

    /**
     * @var StatusRepository
     */
    public $statusRepository;
    /**
     * @var OrderRepository
     */
    private $orderRepository;

    /**
     * ProductService constructor.
     * @param Order $orderModel
     * @param OrderRepository $orderRepository
     */
    public function __construct(Order $orderModel, OrderRepository $orderRepository)
    {

        $this->orderModel = $orderModel;
        $this->orderRepository = $orderRepository;
    }

    public function add(array $attributes): bool
    {
        $createdOrder = $this->orderModel->fill($attributes);
        $createdOrder->save();

        return true;
    }

    public function update(int $id, array $attributes): bool
    {
        /** @var Order $updatedOrder */
        $updatedOrder = $this->orderModel->find($id);
        $updatedOrder->fill($attributes);
        $updatedOrder->save();

        return true;
    }

    public function destroy(int $id): bool
    {
        $orderToDelete = $this->orderModel->findOrFail($id);
        $orderToDelete->delete();

        return true;
    }
}