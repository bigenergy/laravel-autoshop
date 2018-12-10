<?php

namespace App\Services;

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
     * ProductService constructor.
     * @param CartManager $cartManager
     * @param ProductRepository $productRepository
     */
    public function __construct(CartManager $cartManager, ProductRepository $productRepository)
    {
        $this->cartManager = $cartManager;
        $this->productRepository = $productRepository;
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

    public function showCart()
    {
        $cart = $this->cartManager->getCart();

        return $cart->cartItems()->with('product')->get();

    }
}