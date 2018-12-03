<?php

namespace App\Services;


use App\Models\Category;
use App\Models\Product;
use App\Repositories\Category\CategoryRepository;

class CategoryService
{
    /**
     * @var Category
     */
    private $categoryModel;
    /**
     * @var CategoryRepository
     */
    public $repository;


    /**
     * ProductService constructor.
     * @param Category $categoryModel
     * @param CategoryRepository $categoryRepository
     */
    public function __construct(Category $categoryModel, CategoryRepository $categoryRepository)
    {
        $this->categoryModel = $categoryModel;
        $this->repository = $categoryRepository;
    }

    /**
     * Adds new product with relations
     * @param array $attributes
     * @return bool
     */
    public function add(array $attributes): bool
    {
        $createdCategory = $this->categoryModel->fill($attributes);
        $createdCategory->save();

        if(isset($attributes['image'])) {
            $createdCategory->addSingleImage($attributes['image']);
        }

        return true;
    }

    /**
     * @param int $id
     * @param array $attributes
     * @return bool
     */
    public function update(int $id, array $attributes): bool
    {
        /** @var Category $updatedCategory */
        $updatedCategory = $this->categoryModel->find($id);
        $updatedCategory->fill($attributes);
        $updatedCategory->save();

        if(isset($attributes['image'])) {
            $updatedCategory->addSingleImage($attributes['image']);
        }

        return true;
    }

    /**
     * @param int $id
     * @return bool
     */
    public function destroy(int $id): bool
    {
        $categoryToDelete = $this->categoryModel->findOrFail($id);
        $categoryToDelete->delete();

        // TODO -> refactor \/
        $categoryProduct = new Product;
        $categoryProduct->categories()->detach($id);

        return true;
    }
}