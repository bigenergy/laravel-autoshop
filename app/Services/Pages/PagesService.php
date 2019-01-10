<?php

namespace App\Services\Pages;


use App\Models\Pages;
use App\Repositories\Pages\PagesRepository;

class PagesService
{
    /**
     * @var Pages
     */
    private $pagesModel;

    /**
     * @var PagesRepository
     */
    public $pagesRepository;

    /**
     * ProductService constructor.
     * @param Pages $pagesModel
     * @param PagesRepository $pagesRepository
     */
    public function __construct(Pages $pagesModel, PagesRepository $pagesRepository)
    {
        $this->pagesModel = $pagesModel;
        $this->pagesRepository = $pagesRepository;
    }

    public function add(array $attributes): bool
    {
        $createdPage = $this->pagesModel->fill($attributes);
        $createdPage->save();

        return true;
    }

    public function update(int $id, array $attributes): bool
    {
        /** @var Pages $updatedPages */
        $updatedPages = $this->pagesModel->find($id);
        $updatedPages->fill($attributes);
        $updatedPages->save();

        return true;
    }

    public function destroy(int $id): bool
    {
        $pagesToDelete = $this->pagesModel->findOrFail($id);
        $pagesToDelete->delete();

        return true;
    }
}