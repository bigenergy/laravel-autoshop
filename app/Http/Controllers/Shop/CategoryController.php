<?php

namespace App\Http\Controllers\Shop;

use App\Http\Controllers\Controller;
use App\Repositories\Product\ProductRepository;
use App\Repositories\Category\CategoryRepository;
use App\Repositories\ProductType\ProductTypeRepository;

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
     * @var ProductTypeRepository
     */
    private $productTypeRepository;

    /**
     * CategoryController constructor.
     * @param CategoryRepository $categoryRepository
     * @param ProductRepository $productRepository
     * @param ProductTypeRepository $productTypeRepository
     */
    public function __construct(
        CategoryRepository $categoryRepository,
        ProductRepository $productRepository,
        ProductTypeRepository $productTypeRepository
    ){
        $this->categoryRepository = $categoryRepository;
        $this->productRepository = $productRepository;
        $this->productTypeRepository = $productTypeRepository;
    }

    /**
     * @param string $slug
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function show(string $slug)
    {
        $catalogType = $this->productTypeRepository->getBySlug($slug);
        $products = $this->productRepository->getByCategory($catalogType->id);

        return view('shop.category.products', compact('products', 'catalog'));
    }
}
