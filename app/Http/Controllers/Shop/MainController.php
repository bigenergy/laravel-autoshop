<?php

namespace App\Http\Controllers\Shop;

use App\Http\Controllers\Controller;
use App\Services\CategoryService;
use App\Services\ProductService;


class MainController extends Controller
{
    private $categoryService;
    private $productService;

    public function __construct(CategoryService $categoryService, ProductService $productService)
    {
        $this->middleware('auth');
        $this->categoryService = $categoryService;
        $this->productService = $productService;
    }

    public function index() {

        return view('shop.main', []);
    }
}
