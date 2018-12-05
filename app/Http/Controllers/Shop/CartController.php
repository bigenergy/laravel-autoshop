<?php

namespace App\Http\Controllers\Shop;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CartController extends Controller
{
    public function __construct()
    {
        //
    }
    public function show()
    {
        return view('shop.cart.cart');
    }

    public function add(Request $request)
    {
        $id = $request->get('id');
        dd($id);
        //return view('shop.product.index', ['products' => $products]);
    }
}
