<?php

namespace App\Services\Order;


use App\Models\Order;
use App\Repositories\Order\OrderRepository;
use App\Services\Product\ProductService;

class OrderService
{
    /**
     * @var Order
     */
    private $orderModel;


    /**
     * @var OrderRepository
     */
    public $orderRepository;
    /**
     * @var ProductService
     */
    private $productService;

    /**
     * ProductService constructor.
     * @param Order $orderModel
     * @param OrderRepository $orderRepository
     */
    public function __construct(Order $orderModel, OrderRepository $orderRepository, ProductService $productService)
    {

        $this->orderModel = $orderModel;
        $this->orderRepository = $orderRepository;
        $this->productService = $productService;
    }

    public function add(int $orderId, array $products)
    {
//        $createdOrder = $this->orderModel->fill($attributes);
//        $createdOrder->save();
        //$createdProduct = $this->orderModel;
        //$product = $this->productService->repository->getById($productId);

        $updatedOrder = $this->orderModel->find($orderId);

        //$itemInfo = $this->productService->repository->getById();
        dd($products);

        foreach ($products as $item) {
            $updatedOrder->orderItems()->create([
                'price' => '1',
                'quantity' => '1',
                'total_price' => '1'
            ])->fill([
                'product_id' => '1'
            ])->save();
        }

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