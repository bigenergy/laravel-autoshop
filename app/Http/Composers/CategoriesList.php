<?php

namespace App\Http\View\Composers;

use App\Repositories\Category\CategoryRepository;
use Illuminate\View\View;

class CategoriesList
{
    /**
     * @var CategoryRepository
     */
    private $categoryRepository;

    /**
     * CategoriesList constructor.
     * @param CategoryRepository $categoryRepository
     */
    public function __construct(CategoryRepository $categoryRepository)
    {
        $this->categoryRepository = $categoryRepository;
    }

    /**
     * Bind data to the view.
     *
     * @param  View $view
     * @return void
     */
    public function compose(View $view)
    {
        $view->with('categories', $this->categoryRepository->getAll());
    }
}