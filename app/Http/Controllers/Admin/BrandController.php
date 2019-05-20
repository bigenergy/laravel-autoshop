<?php

namespace App\Http\Controllers\Admin;

use App\Services\Brand\BrandService;
use App\Http\Controllers\Controller;
use App\Http\Requests\Brand\BrandEditRequest;
use App\Http\Requests\Brand\BrandCreateRequest;

class BrandController extends Controller
{

    private $brandService;

    public function __construct(BrandService $brandService)
    {
        $this->middleware(['auth', 'admin']);
        $this->brandService = $brandService;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $brandShowList = $this->brandService->repository->getPaginated();

        return view('admin.brand.list', ['brandShowList' => $brandShowList]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.brand.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param BrandCreateRequest $request
     * @return \Illuminate\Http\Response
     */
    public function store(BrandCreateRequest $request)
    {
        $attributes = $request->all();
        $this->brandService->add($attributes);

        return redirect()->route('brand.create')->with('status', 'Бренд добавлен!');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $brandForEdit = $this->brandService->repository->getById($id);

        return view('admin.brand.edit', compact('brandForEdit'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param BrandEditRequest $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function update(BrandEditRequest $request, $id)
    {
        $attributes = $request->all();
        $this->brandService->update($id, $attributes);

        return redirect()->route('brand.edit', $id)->with('status', 'Бренд обновлен!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $this->brandService->destroy($id);

        return redirect()->route('brand.index')->with('status', 'Бренд удален!');
    }
}
