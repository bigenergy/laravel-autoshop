<?php

namespace App\Services\Brand;


use App\Models\Brand;
use App\Repositories\Brand\BrandRepository;

class BrandService
{
    /**
     * @var Brand
     */
    private $brandModel;
    /**
     * @var BrandRepository
     */
    public $repository;


    /**
     * ProductService constructor.
     * @param Brand $brandModel
     * @param BrandRepository $brandRepository
     */
    public function __construct(Brand $brandModel, BrandRepository $brandRepository)
    {
        $this->brandModel = $brandModel;
        $this->repository = $brandRepository;
    }

    /**
     * Adds new product with relations
     * @param array $attributes
     * @return bool
     */
    public function add(array $attributes): bool
    {
        $createdBrand = $this->brandModel->fill($attributes);
        $createdBrand->save();

        if(isset($attributes['image'])) {
            $createdBrand->addBrandSingleImage($attributes['image']);
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
        /** @var Brand $updatedBrand */
        $updatedBrand = $this->brandModel->find($id);
        $updatedBrand->fill($attributes);
        $updatedBrand->save();

        if(isset($attributes['image'])) {
            $updatedBrand->addSingleImage($attributes['image']);
        }

        return true;
    }

    /**
     * @param int $id
     * @return bool
     */
    public function destroy(int $id): bool
    {
        $categoryToDelete = $this->brandModel->findOrFail($id);
        $categoryToDelete->delete();

        return true;
    }
}