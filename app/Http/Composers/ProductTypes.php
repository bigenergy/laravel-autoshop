<?php

namespace App\Http\Composers;


use App\Services\ProductType\ProductTypeService;
use Illuminate\View\View;

class ProductTypes
{
    /**
     * @var ProductTypeService
     */
    private $productTypeService;

    /**
     * ProductTypes constructor.
     * @param ProductTypeService $productTypeService
     */
    public function __construct(ProductTypeService $productTypeService)
    {
        $this->productTypeService = $productTypeService;
    }

    /**
     * Bind data to the view.
     *
     * @param  View $view
     * @return void
     */
    public function compose(View $view)
    {
        $view->with('productTypes', $this->productTypeService->productTypeRepository->getAll());
    }
}