<?php

namespace App\Http\Controllers\Shop;

use App\Models\CartItem;
use Illuminate\Http\Request;
use App\Services\CartService;
use App\Http\Controllers\Controller;

class CartController extends Controller
{
    private $cartService;

    public function __construct(CartService $cartService)
    {
        $this->cartService = $cartService;
    }
    public function show()
    {
        $cart = $this->cartService->showCart();

        return view('shop.cart.cart', ['cart' => $cart]);
    }

    public function add(Request $request)
    {
        $quantity = $request->get('quantity');
        $productId = $request->get('product_id');

        $this->cartService->add($productId, $quantity);

    }

    public function destroy(Request $request)
    {
        $productId = $request->get('id');
        $this->cartService->destroy($productId);
    }



}
