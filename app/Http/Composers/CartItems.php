<?php

namespace App\Http\View\Composers;

use App\Services\Cart\CartService;
use Illuminate\View\View;

class CartItems
{
    /**
     * @var CartService
     */
    private $cartService;

    /**
     * CategoriesList constructor.
     * @param CartService $cartService
     */
    public function __construct(CartService $cartService)
    {
        $this->cartService = $cartService;
    }

    /**
     * Bind data to the view.
     *
     * @param  View $view
     * @return void
     */
    public function compose(View $view)
    {
        $view->with('showCart', $this->cartService->showCart());
    }
}