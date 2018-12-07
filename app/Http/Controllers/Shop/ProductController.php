<?php

namespace App\Http\Controllers\Shop;

use App\Http\Controllers\Controller;
use App\Models\Cart;
use App\Models\CartItem;
use App\Repositories\Cart\CartRepository;
use App\Services\CartManager;
use App\Services\CartService;
use App\Services\ProductService;

class ProductController extends Controller
{

    private $productService;
    /**
     * @var CartService
     */
    private $cartService;
    /**
     * @var CartRepository
     */
    private $cartRepository;
    /**
     * @var CartRepository
     */
    private $repository;
    /**
     * @var CartManager
     */
    private $cartManager;


    /**
     * ProductController constructor.
     * @param ProductService $productService
     * @param CartService $cartService
     */
    public function __construct(ProductService $productService, CartService $cartService, CartManager $cartManager)
    {
        $this->productService = $productService;

        $this->cartService = $cartService;

        $this->cartManager = $cartManager;
    }

    public function show($productSlug)
    {
        $products = $this->productService->repository->getBySlug($productSlug);

        /**
         * GOVNOCODE START
         * TODO refactor
         */

        foreach ($products as $product) {
            $checkProductInCart = $product->id;
        }

        $check = CartItem::where('product_id', '=', $checkProductInCart)->get();

        if (!$check->isEmpty()) {
            $checkCart = $check->first();
        }

        /**
         * GOVNOCODE END
         */

        return view('shop.product.index', ['products' => $products, 'check' => $checkCart ?: null]);
    }

}
