<?php

namespace App\Http\Controllers\Shop;

use App\Http\Controllers\Controller;
use App\Repositories\Brand\BrandRepository;
use App\Repositories\Product\ProductRepository;
use App\Repositories\Category\CategoryRepository;
use App\Repositories\ProductType\ProductTypeRepository;
use Illuminate\Http\Request;

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
     * @var BrandRepository
     */
    private $brandRepository;

    /**
     * CategoryController constructor.
     * @param CategoryRepository $categoryRepository
     * @param ProductRepository $productRepository
     * @param ProductTypeRepository $productTypeRepository
     * @param BrandRepository $brandRepository
     */
    public function __construct(
        CategoryRepository $categoryRepository,
        ProductRepository $productRepository,
        ProductTypeRepository $productTypeRepository,
        BrandRepository $brandRepository
    ){
        $this->categoryRepository = $categoryRepository;
        $this->productRepository = $productRepository;
        $this->productTypeRepository = $productTypeRepository;
        $this->brandRepository = $brandRepository;
    }

    /**
     * @param string $slug
     * @param Request $request
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function show(string $slug, Request $request)
    {
        $catalogType = $this->productTypeRepository->getBySlug($slug);
        $products = $this->productRepository->getByCategory($catalogType->id, $request);
        $categories = $this->categoryRepository->getAll('products');
        $brands = $this->brandRepository->getAll('product');

        return view('shop.category.products', compact(
            'products',
            'catalog',
            'categories',
            'brands',
            'catalogType'
        ));
    }

    public function showCatalog()
    {
        return view('shop.category.catalog_page');
    }
}
