<?php

namespace App\Services\Cart;

use App\Models\Order;
use App\Models\Product;
use App\Repositories\Product\ProductRepository;

class CartService
{

    /**
     * @var CartManager
     */
    private $cartManager;

    /**
     * @var ProductRepository
     */
    private $productRepository;
    /**
     * @var Order
     */
    private $orderModel;

    /**
     * ProductService constructor.
     * @param CartManager $cartManager
     * @param ProductRepository $productRepository
     */
    public function __construct(CartManager $cartManager, ProductRepository $productRepository, Order $orderModel)
    {
        $this->cartManager = $cartManager;
        $this->productRepository = $productRepository;
        $this->orderModel = $orderModel;
    }

    /**
     * Add new product to cart
     *
     * @param int $productId
     * @param int $quantity
     * @return bool
     */
    public function add(int $productId, int $quantity)
    {
        $cart = $this->cartManager->getCart();
        $product = $this->productRepository->getById($productId);

        return $cart->cartItems()->firstOrNew([
            'product_id' => $productId,
        ])->fill([
            'quantity' => $quantity,
            'price' => $product->price,
            'total_price' => $product->price * $quantity
        ])->save();
    }

    /**
     * Show cart by cart_hash cookies
     *
     * @return \Illuminate\Database\Eloquent\Collection
     */
    public function showCart()
    {
        $cart = $this->cartManager->getCart();

        return $cart->cartItems()->with('product')->get();
    }


    /**
     * Check if product in the cart
     *
     * @param Product $product
     * @return bool
     */
    public function checkInCart(Product $product)
    {
        $cart = $this->cartManager->getCart();

        return $cart
            ->cartItems()
            ->where('product_id', '=', $product->id)
            ->exists();
    }

    /**
     * Delete cart item in cart
     *
     * @param int $productId
     */
    public function destroy(int $productId)
    {
       $this->cartManager->deleteProductFromCart($productId);
    }

    /**
     * Edit quantity form cart
     * @param int $productId
     * @param int $quantity
     * @return bool
     */
    public function edit(int $productId, int $quantity)
    {
        $cart = $this->cartManager->getCart();
        $product = $this->productRepository->getById($productId);

        return $cart->cartItems()->firstOrNew([
            'product_id' => $productId,
        ])->fill([
            'quantity' => $quantity,
            'price' => $product->price,
            'total_price' => $product->price * $quantity
        ])->save();
    }

    /**
     * Write user information
     *
     * @param array $request
     * @return string
     * @throws \Exception
     */
    public function store(array $request)
    {
        $number = uniqid() . time();
        $createdProduct = $this->orderModel->fill($request);
        $createdProduct->save();
        $createdProduct->fill(['number' => $number]);
        $createdProduct->save();

        $cart = $this->showCart();

        foreach ($cart as $item) {
            $createdProduct->orderItems()->create([
                'price' => $item->price,
                'quantity' => $item->quantity,
                'total_price' => $item->price * $item->quantity
            ])->fill([
                'product_id' => $item->product->id
            ])->save();
        }

        $this->cartManager->deleteCart();

        return $number;
    }

}