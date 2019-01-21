<?php

namespace App\Http\Controllers\Shop;

use App\Http\Controllers\Controller;
use App\Models\PropsProduct;
use App\Repositories\Brand\BrandRepository;
use App\Repositories\Product\ProductRepository;
use App\Repositories\Category\CategoryRepository;
use App\Repositories\ProductType\ProductTypeRepository;
use App\Repositories\Props\PropsRepository;
use App\Services\Catalog\CatalogService;
use Illuminate\Http\Request;

class CatalogController extends Controller
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
     * @var CatalogService
     */
    private $catalogService;

    /**
     * CategoryController constructor.
     * @param CategoryRepository $categoryRepository
     * @param ProductRepository $productRepository
     * @param ProductTypeRepository $productTypeRepository
     * @param BrandRepository $brandRepository
     * @param PropsRepository $propsRepository
     * @param CatalogService $catalogService
     */
    public function __construct(
        CategoryRepository $categoryRepository,
        ProductRepository $productRepository,
        ProductTypeRepository $productTypeRepository,
        BrandRepository $brandRepository,
        PropsRepository $propsRepository,
        CatalogService $catalogService
    ) {
        $this->categoryRepository = $categoryRepository;
        $this->productRepository = $productRepository;
        $this->productTypeRepository = $productTypeRepository;
        $this->brandRepository = $brandRepository;
        $this->propsRepository = $propsRepository;
        $this->catalogService = $catalogService;
    }

    /**
     * @param string $slug
     * @param Request $request
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     * @throws \Throwable
     */
    public function show(string $slug, Request $request)
    {
        $filters = $this->prepareCatalogFilter($request, $slug);
        $products = $this->catalogService->getProducts($filters);

        $catalogType = $this->productTypeRepository->getBySlug($slug);
        $brands = $this->brandRepository->getAllWithCount('product', $catalogType->id);

        $props = $this->propsRepository->getFilterProps('propValue', $catalogType->id);
        $categories = $this->categoryRepository->getAllWithCount('products');

        return view('shop.category.products', compact(
            'products',
            'catalog',
            'categories',
            'brands',
            'catalogType',
            'props',
            'props2'
        ));
    }

    /**
     * Render Catalog page filter after ajax request
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     * @throws \Throwable
     */

    public function catalogRender(Request $request)
    {
        $filters = $this->prepareCatalogFilter($request, $request->slug);
        $products = $this->catalogService->getProducts($filters);

        $getProducts = view('shop.category.list', compact(
            'products',
            'catalog',
            'categories',
            'brands',
            'catalogType',
            'props'
        ))->render();

        return response()->json($getProducts);
    }
    /**
     * Catalog page (/catalog)
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function showCatalog()
    {
        return view('shop.category.catalog_page');
    }

    /**
     * @param Request $request
     * @param string $slug
     * @return array
     */
    public function prepareCatalogFilter(Request $request, string $slug): array
    {
        $filters = $request->all();
        $filters['product_type'] = $slug;

        return $filters;
    }
}
