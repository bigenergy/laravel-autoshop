<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Services\Pages\PagesService;
use Illuminate\Http\Request;

class PagesController extends Controller
{
    /**
     * @var PagesService
     */
    private $pagesService;

    /**
     * PagesController constructor.
     * @param PagesService $pagesService
     */
    public function __construct(PagesService $pagesService)
    {
        $this->middleware(['auth', 'admin']);
        $this->pagesService = $pagesService;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pages = $this->pagesService->pagesRepository->getPaginated();

        return view('admin.pages.list', compact('pages'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.pages.create');
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
        $this->pagesService->add($attributes);

        return redirect()->route('pages.create')->with('status', 'Страница добавлена!');
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $pageForEdit = $this->pagesService->pagesRepository->getById($id);

        return view('admin.pages.edit', compact('pageForEdit'));
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
        $this->pagesService->update($id, $attributes);

        return redirect()->route('pages.edit', $id)->with('status', 'Статическая сраница обновлена!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $this->pagesService->destroy($id);

        return redirect()->route('pages.index')->with('status', 'Статическая страница удалена!');
    }
}
