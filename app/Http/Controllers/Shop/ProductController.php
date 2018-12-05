<?php

namespace App\Http\Controllers\Shop;

use App\Http\Controllers\Controller;
use App\Services\ProductService;

class ProductController extends Controller
{

    private $productService;

    /**
     * ProductController constructor.
     * @param ProductService $productService
     */
    public function __construct(ProductService $productService)
    {
        $this->productService = $productService;
    }

    public function show($productSlug)
    {
        $products = $this->productService->repository->getBySlug($productSlug);

        return view('shop.product.index', ['products' => $products]);
    }
}
