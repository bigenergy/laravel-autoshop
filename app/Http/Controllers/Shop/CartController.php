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
    public function showCart()
    {
        $cart = $this->cartService->showCart();

        return view('shop.cart.cart', ['cart' => $cart]);
    }

    public function addToCart(Request $request)
    {
        $quantity = $request->get('quantity');
        $productId = $request->get('product_id');

        $this->cartService->add($productId, $quantity);

    }

    public function destroyInCart(Request $request)
    {
        $productId = $request->get('id');
        $this->cartService->destroy($productId);
    }

    public function editCart(Request $request)
    {
        $quantity = $request->get('quantity');
        $productId = $request->get('product_id');

        $this->cartService->add($productId, $quantity);
    }

    public function showDetail()
    {
        $cart = $this->cartService->showCart();

        if(count($cart)) {
            return view('shop.cart.cart_detail');
        }

        return redirect()->route('shop.main');

    }

    public function writeDetail(Request $request)
    {
        $inputs = $request->all();
        $this->cartService->write($inputs);

        return redirect()->route('shop.main');
    }
}
