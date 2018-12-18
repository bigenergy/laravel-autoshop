<?php

namespace App\Services\Order;

use App\Models\OrderItem;
use App\Repositories\Product\ProductRepository;

class OrderItemService
{
    /**
     * @var ProductRepository
     */
    private $productRepository;

    /**
     * OrderItemService constructor.
     * @param $productRepository
     */
    public function __construct(ProductRepository $productRepository)
    {
        $this->productRepository = $productRepository;
    }

    /**
     * Returns generated order items
     *
     * @param array $data
     * @return \Illuminate\Support\Collection
     */
    public function generate(array $data)
    {
        $orderItems = collect();

        foreach ($data as $datum) {
            $product = $this->productRepository->getById($datum['product_id']);

            $orderItems->push(new OrderItem([
                'price' => $product->price,
                'product_id' => $product->id,
                'quantity' => $datum['quantity'],
                'total_price' => $product->price * $datum['quantity'],
            ]));
        }

        return $orderItems;
    }
}