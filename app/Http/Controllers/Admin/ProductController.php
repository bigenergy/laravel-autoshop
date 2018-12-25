<?php

namespace App\Http\Controllers\Admin;

use App\Models\Brand;
use App\Models\Category;
use App\Http\Controllers\Controller;
use App\Repositories\ProductType\ProductTypeRepository;
use App\Services\Product\ProductService;
use App\Repositories\Brand\BrandRepository;
use App\Repositories\Category\CategoryRepository;
use App\Http\Requests\Product\{ ProductEditRequest, ProductCreateRequest };
use App\Services\Props\PropsService;

class ProductController extends Controller
{
    /**
     * @var ProductService
     */
    private $productService;
    /**
     * @var CategoryRepository
     */
    private $categoryRepository;

    /**
     * @var BrandRepository
     */
    private $brandRepository;
    /**
     * @var ProductTypeRepository
     */
    private $productTypeRepository;
    /**
     * @var PropsService
     */
    private $propsService;

    public function __construct(
        ProductService $productService,
        PropsService $propsService,
        CategoryRepository $categoryRepository,
        BrandRepository $brandRepository,
        ProductTypeRepository $productTypeRepository
    ) {
        $this->middleware('auth');
        $this->productService = $productService;
        $this->categoryRepository = $categoryRepository;
        $this->brandRepository = $brandRepository;
        $this->productTypeRepository = $productTypeRepository;
        $this->propsService = $propsService;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = $this->productService->repository->getPaginated(['categories', 'brand', 'productType']);

        return view('admin.product.list', compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = $this->categoryRepository->getPaginated();
        $brand = $this->brandRepository->getPaginated();
        $type = $this->productTypeRepository->getPaginated();
        $list = $this->propsService->propsRepository->getPaginated([]);

        return view('admin.product.create', compact('categories', 'brand', 'type', 'list'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param ProductCreateRequest $request
     * @return \Illuminate\Http\Response
     */
    public function store(ProductCreateRequest $request)
    {
        $attributes = $request->all();
        $this->productService->add($attributes);

        return redirect()->route('product.create')->with('status', 'Продукт добавлен!');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $productForEdit = $this->productService->repository->getById($id);
        $categories = Category::all();
        $brand = Brand::all();
        $type = $this->productTypeRepository->getPaginated();

        return view('admin.product.edit', compact('productForEdit', 'categories', 'brand', 'type'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param ProductEditRequest $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function update(ProductEditRequest $request, $id)
    {
        $attributes = $request->all();
        $this->productService->update($id, $attributes);

        return redirect()->route('product.edit', $id)->with('status', 'Продукт обновлен!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     * @throws \Exception
     */
    public function destroy($id)
    {
        $this->productService->destroy($id);

        return redirect()->route('product.index')->with('status', 'Продукт удален!');
    }
}