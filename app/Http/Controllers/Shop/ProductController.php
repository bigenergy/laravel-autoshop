<?php

namespace App\Http\Controllers\Shop;

use App\Http\Controllers\Controller;
use App\Models\Cart;
use App\Models\CartItem;
use App\Repositories\Cart\CartRepository;
use App\Services\Cart\CartManager;
use App\Services\Cart\CartService;
use App\Services\Product\ProductService;

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

        foreach ($products as $product) {
            $checkProductInCart = $product->id;
        }

        $check = $this->cartService->checkInCart($checkProductInCart);

        return view('shop.product.index', ['products' => $products, 'check' => $check]);
    }

}
