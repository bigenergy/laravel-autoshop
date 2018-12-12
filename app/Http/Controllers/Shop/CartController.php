<?php

namespace App\Http\Controllers\Shop;

use App\Models\CartItem;
use Illuminate\Http\Request;
use App\Services\CartService;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Cookie;

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

    /**
     * Show cart detail, filling in user data or address for delivery
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\Http\RedirectResponse|\Illuminate\View\View
     */
    public function showDetail()
    {
        $cart = $this->cartService->showCart();

        if(count($cart)) {
            return view('shop.cart.cart_detail');
        }

        return redirect()->route('shop.main');

    }

    /**
     * Write user details from database
     *
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function writeDetail(Request $request)
    {
        $inputs = $request->all();
        $this->cartService->write($inputs);

        return redirect()->route('shop.cart.complete');
    }

    public function showComplete()
    {
        return view('shop.cart.cart_complete');
    }
}
