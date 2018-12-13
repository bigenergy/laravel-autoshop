<?php

namespace App\Http\Controllers\Shop;

use Illuminate\Http\Request;
use App\Services\Cart\CartService;
use App\Http\Controllers\Controller;

class CartController extends Controller
{
    private $cartService;

    public function __construct(CartService $cartService)
    {
        $this->cartService = $cartService;
    }

    /**
     * Show cart page
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function showCart()
    {
        $cart = $this->cartService->showCart();

        return view('shop.cart.cart', ['cart' => $cart]);
    }

    /**
     * Add product to cart
     *
     * @param Request $request
     */
    public function addToCart(Request $request)
    {
        $quantity = $request->get('quantity');
        $productId = $request->get('product_id');

        $this->cartService->add($productId, $quantity);

    }

    /**
     * Delete product from cart
     *
     * @param Request $request
     */
    public function destroyInCart(Request $request)
    {
        $productId = $request->get('id');
        $this->cartService->destroy($productId);
    }

    /**
     * Edit product in cart (change quantity)
     *
     * @param Request $request
     */
    public function editCart(Request $request)
    {
        $quantity = $request->get('quantity');
        $productId = $request->get('product_id');

        $this->cartService->add($productId, $quantity);
    }
}
