<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\BrandCreateRequest;
use App\Http\Requests\BrandEditRequest;
use App\Http\Controllers\Controller;
use App\Http\Requests\StatusCreateRequest;
use App\Http\Requests\StatusEditRequest;
use App\Services\BrandService;
use App\Services\StatusService;

class StatusController extends Controller
{

    private $statusService;

    /**
     * StatusController constructor.
     * @param StatusService $statusService
     */
    public function __construct(StatusService $statusService)
    {
        $this->middleware('admin');
        $this->statusService = $statusService;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $statusShowList = $this->statusService->statusRepository->getPaginated();

        return view('admin.status.list', ['statusShowList' => $statusShowList]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.status.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param StatusCreateRequest $request
     * @return \Illuminate\Http\Response
     */
    public function store(StatusCreateRequest $request)
    {
        $attributes = $request->all();
        $this->statusService->add($attributes);

        return redirect()->route('status.create')->with('status', 'Статус добавлен!');
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $statusForEdit = $this->statusService->statusRepository->getById($id);

        return view('admin.status.edit', compact('statusForEdit'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param BrandEditRequest $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function update(StatusEditRequest $request, $id)
    {
        $attributes = $request->all();
        $this->statusService->update($id, $attributes);

        return redirect()->route('status.edit', $id)->with('status', 'Статус обновлен!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $this->statusService->destroy($id);

        return redirect()->route('status.index')->with('status', 'Статус удален!');
    }
}
