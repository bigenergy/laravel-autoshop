<?php

namespace App\Services\Order;

use App\Models\Order;
use App\Models\Product;
use App\Models\OrderItem;
use Illuminate\Support\Collection;
use App\Repositories\Product\ProductRepository;

class OrderItemService
{
    /**
     * @var OrderItem
     */
    private $orderItemModel;
    /**
     * @var ProductRepository
     */
    private $productRepository;


    /**
     * OrderItemService constructor.
     * @param OrderItem $orderItemModel
     * @param ProductRepository $productRepository
     */
    public function __construct
    (
        OrderItem $orderItemModel,
        ProductRepository $productRepository
    )
    {
        $this->orderItemModel = $orderItemModel;
        $this->productRepository = $productRepository;
    }

    /**
     * @param array $productsList
     * @param Order $updatedOrder
     * @return Collection
     */
    public function generateOrderItems(array $productsList, Order $updatedOrder): Collection
    {
        $orderItems = collect();
        $existingItems = $updatedOrder->orderItems;

        foreach ($productsList as $productId => $quantity) {
            $productPrice = $this->getProductPrice($productId, $existingItems);
            /** @var Product $productForItem */
            $newItem = new OrderItem();
            $newItem->product_id = $productId;
            $newItem->quantity = $quantity;
            $newItem->price = $productPrice;
            $newItem->total_price = $newItem->quantity * $newItem->price;

            $orderItems->push($newItem);
        }

        return $orderItems;
    }

    /**
     * @param Collection $items
     * @return bool |null
     */
    public function destroyItems(Collection $items)
    {
        foreach ($items as $item) {
            $item->delete();
        }

        return true;
    }

    /**
     * @param $productId
     * @param Collection $existingItems
     * @return |null
     */
    public function getProductPrice(int $productId, Collection $existingItems)
    {
        $product = $this->productRepository->getById($productId);
        $existingItemsPrice = $existingItems->where("product_id", $productId)->first()->price ?? null;
        return $existingItemsPrice ?? $product->price;
    }
}