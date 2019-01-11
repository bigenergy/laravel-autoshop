<?php

namespace App\Http\Controllers\Shop;

use App\Http\Controllers\Controller;
use App\Repositories\Pages\PagesRepository;
use App\Repositories\Product\ProductRepository;

class MainController extends Controller
{
    /**
     * @var ProductRepository
     */
    private $productRepository;
    /**
     * @var PagesRepository
     */
    private $pagesRepository;


    /**
     * MainController constructor.
     * @param ProductRepository $productRepository
     * @param PagesRepository $pagesRepository
     */
    public function __construct(ProductRepository $productRepository, PagesRepository $pagesRepository)
    {
        $this->productRepository = $productRepository;
        $this->pagesRepository = $pagesRepository;
    }


    public function index() {

        $products = $this->productRepository->getNewAll();
        $about = $this->pagesRepository->getById('3');

        return view('shop.layouts.main_products', compact('products', 'about'));
    }
}
