<?php

namespace App\Http\View\Composers;

use Illuminate\View\View;
use App\Repositories\Category\CategoryRepository;

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
        $view->with('categoryShowList', $this->categoryRepository->getAll());
    }
}