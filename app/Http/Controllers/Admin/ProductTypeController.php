<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Services\Props\PropsService;
use App\Services\ProductType\ProductTypeService;

class ProductTypeController extends Controller
{
    /**
     * @var PropsService
     */
    private $propsService;

    /**
     * @var ProductTypeService
     */
    private $productTypeService;

    /**
     * ProductTypeController constructor.
     * @param PropsService $propsService
     * @param ProductTypeService $productTypeService
     */
    public function __construct(PropsService $propsService, ProductTypeService $productTypeService)
    {
        $this->middleware(['auth', 'admin']);
        $this->propsService = $propsService;
        $this->productTypeService = $productTypeService;
    }

    /**
     * Display a listing product types
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $productType = $this->productTypeService->productTypeRepository->getPaginated();

        return view('admin.product_type.list', compact('productType'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.product_type.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $attributes = $request->all();
        $this->productTypeService->add($attributes);

        return redirect()->route('type.create')->with('status', 'Новый тип товаров добавлен!');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $productTypeEdit = $this->productTypeService->productTypeRepository->getById($id);

        return view('admin.product_type.edit', compact('productTypeEdit'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $attributes = $request->all();
        $this->productTypeService->update($id, $attributes);

        return redirect()->route('type.edit', $id)->with('status', 'Тип товаров обновлен!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $this->productTypeService->destroy($id);

        return redirect()->route('type.index')->with('status', 'Тип товаров удалён!');
    }

    /**
     * Returns view of attributes by product type id
     *
     * @param $id
     * @return \Illuminate\Http\JsonResponse
     * @throws \Throwable
     */
    public function getAttributes($id)
    {
        $attributes = $this->propsService->propsRepository->getByTypeId($id);

        return response()->json(
            view('admin.product.attributes_list', compact('attributes'))->render()
        );
    }
}
