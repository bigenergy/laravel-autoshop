<?php

namespace App\Http\Controllers\Shop;

use App\Http\Controllers\Controller;
use App\Services\CartService;
use Illuminate\Http\Request;
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
        $productAttributes = $request->only('product_id', 'quantity');

        $this->cartService->add($productAttributes);


//        $random_hash = Hash::make(str_random(32));
//        Cookie::queue('cart_hash', $random_hash);
//
//        $value = Cookie::get('cart_hash');
//        return response($value);





    }
}
