<?php

namespace App\Services\Order;

use App\Models\Cart;
use App\Models\Order;
use App\Models\CartItem;
use App\Models\OrderItem;
use App\Services\Cart\CartManager;
use Illuminate\Support\Collection;
use App\Repositories\Order\OrderRepository;

class OrderService
{
    public $orderModel;

    public $userManager;

    public $cartManager;

    public $addressService;

    public $orderRepository;

    public $orderItemService;

    /**
     * OrderService constructor.
     * @param Order $orderModel
     * @param CartManager $cartManager
     * @param OrderItemService $orderItemService
     * @param OrderRepository $orderRepository
     */
    public function __construct(
        Order $orderModel,
        CartManager $cartManager,
        OrderItemService $orderItemService,
        OrderRepository $orderRepository
    ) {
        $this->orderModel = $orderModel;
        $this->cartManager = $cartManager;
        $this->orderItemService = $orderItemService;
        $this->orderRepository = $orderRepository;
    }

    /**
     * @param array $orderAttributes
     * @return Order
     */
    public function addByCustomer(array $orderAttributes): Order
    {
        $cart = $this->cartManager->getCart();
        $orderAttributes = $this->prepareOrderAttributes($orderAttributes);
        /** @var Order $createdOrder */
        $createdOrder = $this->add($orderAttributes);
        $this->addItemsFromCart($createdOrder, $cart);

        return $createdOrder;
    }

    /**
     * @param array $orderAttributes
     * @return array
     */
    public function prepareOrderAttributes(array $orderAttributes): array
    {
        $user = $this->userManager->getCurrentUser();

        return array_merge($orderAttributes,
            [
                'user_id' => $user == null ? null : $user->id,
                'status_id' => 1
            ]);
    }

    /**
     * @param Order $order
     * @param Cart $cart
     * @return bool
     */
    public function addItemsFromCart(Order $order, Cart $cart): bool
    {
        $orderItems = $this->generateFromCart($cart);
        $order->addItems($orderItems);

        return true;
    }

    /**
     * Generates order items for order from cart
     * @param Cart $cart
     * @return Collection
     */
    private function generateFromCart(Cart $cart): Collection
    {
        $ordersItems = new Collection();
        /** @var CartItem $cartItem */
        foreach ($cart->cartItems as $cartItem) {
            $newOrderItem = new OrderItem([
                'product_id' => $cartItem->product_id,
                'quantity' => $cartItem->quantity,
                'price' => $cartItem->price,
                'total_price' => $cartItem->total_price
            ]);

            $ordersItems->push($newOrderItem);
        }

        return $ordersItems;
    }

    /**
     * @param array $orderAttributes
     * @return Order
     */
    public function addByAdmin(array $orderAttributes): Order
    {
        $createdOrder = $this->add($orderAttributes);
        $this->addItemsFromArray($createdOrder, $orderAttributes);

        return $createdOrder;
    }

    /**
     * Create new Order
     * @param array $orderAttributes
     * @return Order
     */
    public function add(array $orderAttributes): Order
    {
        $createdOrder = $this->orderModel->fill($orderAttributes);
        $createdOrder->fill(['number' => uniqid() . time()]);
        $createdOrder->save();

        return $createdOrder;
    }

    /**
     * Update order
     * @param int $id
     * @param array $attributes
     * @return bool
     */
    public function update(int $id, array $attributes): bool
    {
        /** @var Order $updatedOrder */
        $updatedOrder = $this->orderRepository->getById($id);
        $existingItems = $updatedOrder->orderItems;
        $updatedOrder->fill($attributes);
        $this->addItemsFromArray($updatedOrder, $attributes);
        $this->orderItemService->destroyItems($existingItems);

        return true;
    }

    /**
     * Add Items to Order and save
     * @param Order $order
     * @param array $attributes
     * @return bool
     */
    public function addItemsFromArray(Order $order, array $attributes): bool
    {
        $orderItems = $this->orderItemService->generateOrderItems($attributes["order_items"], $order);
        $order->addItems($orderItems);

        return true;
    }

    /**
     * Delete order
     * @param $orderItem_id
     * @return bool
     */
    public function destroy($orderItem_id)
    {
        $orderToDelete = $this->orderModel->find($orderItem_id);
        $orderItemsToDelete = $orderToDelete->orderItems;

        $orderToDelete->delete();
        $this->orderItemService->destroyItems($orderItemsToDelete);

        return true;
    }

    /**
     * Make temporary order
     * @param int $orderId
     * @param array $productsList
     * @return Order
     */
    public function make(?int $orderId , array $productsList): Order
    {
        $order = $orderId == null ? new Order() : $this->orderModel->find($orderId);

        $orderItems = $this->orderItemService->generateOrderItems($productsList, $order);
        $order->setRelation('orderItems', $orderItems);

        return $order;
    }

}