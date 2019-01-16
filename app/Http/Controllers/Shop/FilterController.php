<?php

namespace App\Http\Controllers\Shop;

use App\Repositories\Brand\BrandRepository;
use App\Repositories\Category\CategoryRepository;
use App\Repositories\Product\ProductRepository;
use App\Repositories\ProductType\ProductTypeRepository;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

class FilterController extends Controller
{

    /**
     * @var ProductRepository
     */
    private $productRepository;
    /**
     * @var ProductTypeRepository
     */
    private $productTypeRepository;
    /**
     * @var CategoryRepository
     */
    private $categoryRepository;
    /**
     * @var BrandRepository
     */
    private $brandRepository;

    /**
     * FilterController constructor.
     * @param ProductRepository $productRepository
     * @param ProductTypeRepository $productTypeRepository
     * @param CategoryRepository $categoryRepository
     * @param BrandRepository $brandRepository
     */
    public function __construct(
        ProductRepository $productRepository,
        ProductTypeRepository $productTypeRepository,
        CategoryRepository $categoryRepository,
        BrandRepository $brandRepository
    ){
        $this->productRepository = $productRepository;
        $this->productTypeRepository = $productTypeRepository;
        $this->categoryRepository = $categoryRepository;
        $this->brandRepository = $brandRepository;
    }

    /**
     * Display a listing of the resource.
     *
     * @param Request $request
     * @return void
     * @throws \Throwable
     */
    public function sortingFilter(Request $request)
    {
        $catalogType = $this->productTypeRepository->getBySlug($request->slug);
        $products = $this->productRepository->getByCategory($catalogType->id, $request);
        $categories = $this->categoryRepository->getAll();
        $brands = $this->brandRepository->getAll();

        $getProducts = view('shop.category.list', compact('products', 'catalogType', 'categories', 'brands'))->render();

        return response()->json($getProducts);
    }

}
