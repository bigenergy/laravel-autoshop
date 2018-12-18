<?php

namespace App\Http\Controllers\Shop;

use Illuminate\Http\Request;
use App\Services\Cart\CartService;
use App\Http\Controllers\Controller;


class OrderController extends Controller
{
    private $cartService;

    public function __construct(CartService $cartService)
    {
        $this->cartService = $cartService;
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
            return view('shop.order.order_detail');
        }

        return redirect()->route('shop.main');
    }

    /**
     * Write user details from database
     *
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function storeDetail(Request $request)
    {
        $inputs = $request->all();
        $writing = $this->cartService->store($inputs);

        return redirect()->route('shop.order.complete')->with('status', $writing);
    }

    public function showComplete()
    {
        if (session('status')) {
            return view('shop.order.order_complete');
        }

        return redirect()->back();
    }
}
