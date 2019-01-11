<?php

namespace App\Http\Controllers\Shop;

use App\Http\Controllers\Controller;
use App\Repositories\Product\ProductRepository;
use App\Repositories\Category\CategoryRepository;

class CategoryController extends Controller
{
    /**
     * @var CategoryRepository
     */
    private $categoryRepository;
    /**
     * @var ProductRepository
     */
    private $productRepository;

    /**
     * CategoryController constructor.
     * @param CategoryRepository $categoryRepository
     * @param ProductRepository $productRepository
     */
    public function __construct(CategoryRepository $categoryRepository, ProductRepository $productRepository)
    {
        $this->categoryRepository = $categoryRepository;
        $this->productRepository = $productRepository;
    }

    public function show(string $slug)
    {
        $category = $this->categoryRepository->getBySlug($slug);
        $products = $this->productRepository->getByCategory($category);
        $categories = $this->categoryRepository->getAll();

        return view('shop.category.products', compact('products', 'categories'));
    }
}
