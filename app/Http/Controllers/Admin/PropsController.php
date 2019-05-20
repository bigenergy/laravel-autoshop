<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Services\ProductType\ProductTypeService;
use App\Services\Props\PropsService;
use Illuminate\Http\Request;

class PropsController extends Controller
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
     * PropsController constructor.
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
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $props = $this->propsService->propsRepository->getPaginated(['product']);

        return view('admin.props.list', compact('props'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $type = $this->productTypeService->productTypeRepository->getAll();

        return view('admin.props.create', compact('type'));
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
        $this->propsService->add($attributes);

        return redirect()->route('props.create')->with('status', 'Новое поле добавлено!');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $propsEdit= $this->propsService->propsRepository->getById($id);
        $type = $this->productTypeService->productTypeRepository->getAll();

        return view('admin.props.edit', compact('propsEdit', 'type'));
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
        $this->propsService->update($id, $attributes);

        return redirect()->route('props.edit', $id)->with('status', 'Поле обновлено!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $this->propsService->destroy($id);

        return redirect()->route('props.index')->with('status', 'Поле удалёно!');
    }
}
