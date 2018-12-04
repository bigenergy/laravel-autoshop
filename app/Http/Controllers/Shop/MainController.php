<?php

namespace App\Http\Controllers\Shop;

use App\Http\Controllers\Controller;
use App\Repositories\Product\ProductRepository;
use App\Services\CategoryService;
use App\Services\ProductService;


class MainController extends Controller
{
    /**
     * @var ProductRepository
     */
    private $productRepository;


    public function __construct(ProductRepository $productRepository)
    {
        $this->middleware('auth');
        $this->productRepository = $productRepository;
    }

    public function index() {

        $products = $this->productRepository->getPaginated();

        return view('shop.main', ['products' => $products]);
    }
}
