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
    private $pagesRepository;

    /**
     * PagesService constructor.
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
        /** @var Pages $updatedPage */
        $updatedPage = $this->pagesModel->find($id);
        $updatedPage->fill($attributes);
        $updatedPage->save();

        return true;
    }

    public function destroy(int $id): bool
    {
        $pageToDelete = $this->pagesModel->findOrFail($id);
        $pageToDelete->delete();

        return true;
    }
}