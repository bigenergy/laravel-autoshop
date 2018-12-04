<?php

namespace App\Http\Controllers\Shop;

use App\Http\Controllers\Controller;
use App\Services\CategoryService;
use App\Services\ProductService;
use Illuminate\Http\Request;

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

        $categoryShowList = $this->categoryService->repository->getPaginated();
        $products = $this->productService->repository->getPaginated(['categories', 'brand']);

        return view('shop.main', [
            'categoryShowList' => $categoryShowList,
            'products' => $products
        ]);
    }

    public function show($id) {
        $categoryShowList = $this->categoryService->repository->getPaginated();
        $products = $this->categoryService->repository->getById($id);

        return view('shop.category.products', ['products' => $products, 'categoryShowList' => $categoryShowList]);
    }
}
