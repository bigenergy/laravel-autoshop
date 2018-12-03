<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\CategoryCreateRequest;
use App\Http\Requests\CategoryEditRequest;
use App\Models\Category;
use App\Http\Controllers\Controller;
use App\Services\CategoryService;

class CategoryController extends Controller
{

    /**
     * @var CategoryService
     */

    private $categoryService;

    public function __construct(CategoryService $categoryService)
    {
        $this->middleware('auth');
        $this->categoryService = $categoryService;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function index()
    {
        $categoryShowList = $this->categoryService->repository->getPaginated();

        return view('admin.category.list', ['categoryShowList' => $categoryShowList]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = $this->categoryService->repository->getPaginated();

        return view('admin.category.create', compact('categories'));
    }

    public function store(CategoryCreateRequest $request)
    {
        $attributes = $request->all();
        $this->categoryService->add($attributes);

        return redirect()->route('category.create')->with('status', 'Категория добавлена!');
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $categoryForEdit = $this->categoryService->repository->getById($id);

        return view('admin.category.edit', compact('categoryForEdit'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(CategoryEditRequest $request, $id)
    {
        $attributes = $request->all();
        $this->categoryService->update($id, $attributes);

        return redirect()->route('category.edit', $id)->with('status', 'Категория обновлена!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $this->categoryService->destroy($id);

        return redirect()->route('category.index')->with('status', 'Категория удалена!');
    }

}
