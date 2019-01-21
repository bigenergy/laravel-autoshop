<?php

namespace App\Http\Controllers\Shop;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\PropsProduct;
use App\Repositories\Brand\BrandRepository;
use App\Repositories\Product\ProductRepository;
use App\Repositories\Category\CategoryRepository;
use App\Repositories\ProductType\ProductTypeRepository;
use App\Repositories\Props\PropsRepository;
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
     * @var PropsRepository
     */
    private $propsRepository;

    /**
     * CategoryController constructor.
     * @param CategoryRepository $categoryRepository
     * @param ProductRepository $productRepository
     * @param ProductTypeRepository $productTypeRepository
     * @param BrandRepository $brandRepository
     * @param PropsRepository $propsRepository
     */
    public function __construct(
        CategoryRepository $categoryRepository,
        ProductRepository $productRepository,
        ProductTypeRepository $productTypeRepository,
        BrandRepository $brandRepository,
        PropsRepository $propsRepository
    ){
        $this->categoryRepository = $categoryRepository;
        $this->productRepository = $productRepository;
        $this->productTypeRepository = $productTypeRepository;
        $this->brandRepository = $brandRepository;
        $this->propsRepository = $propsRepository;
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
        $brands = $this->brandRepository->getAllWithCount('product', $catalogType->id);
        //$props = $this->propsService->propsRepository->getAll();

        $props = PropsProduct::where('prop_id', 8)->get();
        $categories = $this->categoryRepository->getAllWithCount('products');

        return view('shop.category.products', compact(
            'products',
            'catalog',
            'categories',
            'brands',
            'catalogType',
            'props'
        ));
    }

    /**
     * Catalog page (/catalog)
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function showCatalog()
    {
        return view('shop.category.catalog_page');
    }
}
