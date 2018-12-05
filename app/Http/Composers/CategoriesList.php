<?php

namespace App\Http\View\Composers;

use App\Repositories\Brand\BrandRepository;
use App\Repositories\Category\CategoryRepository;
use Illuminate\View\View;

class CategoriesList
{
    /**
     * @var CategoryRepository
     */
    private $categoryRepository;

    /**
     * @var BrandRepository
     */
    private $brandRepository;

    /**
     * CategoriesList constructor.
     * @param CategoryRepository $categoryRepository
     * @param BrandRepository $brandRepository
     */
    public function __construct(CategoryRepository $categoryRepository, BrandRepository $brandRepository)
    {
        $this->categoryRepository = $categoryRepository;
       // $this->brandRepository = $brandRepository;
    }

    /**
     * Bind data to the view.
     *
     * @param  View $view
     * @return void
     */
    public function compose(View $view)
    {
        $view->with('categories', $this->categoryRepository->getPaginated());

       // $view->with('brands', $this->brandRepository->getAll());
    }
}