<?php

namespace App\Http\Controllers\Shop;

use Illuminate\Http\Request;
use App\Services\CartService;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Facades\Hash;

class CartController extends Controller
{
    private $cartService;

    public function __construct(CartService $cartService)
    {
        $this->cartService = $cartService;
    }
    public function show()
    {
        return view('shop.cart.cart');
    }

    public function add(Request $request)
    {
        $quantity = $request->get('quantity');
        $productId = $request->get('product_id');

        $this->cartService->add($productId, $quantity);


//        $random_hash = Hash::make(str_random(32));
//        Cookie::queue('cart_hash', $random_hash);
//
//        $value = Cookie::get('cart_hash');
//        return response($value);





    }
}
