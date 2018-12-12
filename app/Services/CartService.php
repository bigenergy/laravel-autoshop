<?php

namespace App\Services;

use App\Models\Order;
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
     * @param $products
     * @return \Illuminate\Database\Eloquent\Collection
     */
    public function checkInCart($products)
    {
        $cart = $this->cartManager->getCart();

        return $cart->cartItems()->with('product')->where('product_id', '=', $products)->get();
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
     * @throws \Exception
     */
    public function write(array $request)
    {
        $createdProduct = $this->orderModel->fill($request);
        $createdProduct->save();
        $createdProduct->fill(['number' => uniqid()]);
        $createdProduct->save();

        $cart = $this->showCart();

        foreach ($cart as $item) {
            $createdProduct->orderItems()->create()->fill([
                'product_id' => $item->product->id
            ])->save();
        }

        $this->cartManager->deleteCart();
    }

}