<?php

namespace App\Http\Controllers\Shop;

use App\Http\Controllers\Controller;
use App\Services\Pages\PagesService;

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
        $this->pagesService = $pagesService;
    }

    public function getPage(string $slug)
    {
        $page = $this->pagesService->pagesRepository->getBySlug($slug);

        return view('shop.pages.static_page')->with('page', $page);
    }
}
