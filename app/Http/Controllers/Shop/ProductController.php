<?php

namespace App\Http\Controllers\Shop;

use App\Services\Cart\CartService;
use App\Services\Cart\CartManager;
use App\Http\Controllers\Controller;
use App\Services\Product\ProductService;
use App\Repositories\Cart\CartRepository;

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
    private $repository;
    /**
     * @var CartManager
     */
    private $cartManager;

    /**
     * ProductController constructor.
     * @param ProductService $productService
     * @param CartService $cartService
     * @param CartManager $cartManager
     */
    public function __construct(
        ProductService $productService,
        CartService $cartService,
        CartManager $cartManager
    ) {
        $this->productService = $productService;
        $this->cartService = $cartService;
        $this->cartManager = $cartManager;
    }

    /**
     * Show detail product
     * @param string $productSlug
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function show(string $productSlug)
    {
        $product = $this->productService->repository->getBySlug('props', $productSlug);

        if (is_null($product)) {
            abort(404, "product not found");
        }

        $isInCart = $this->cartService->checkInCart($product);

        return view('shop.product.index', compact('product', 'isInCart'));
    }

}
