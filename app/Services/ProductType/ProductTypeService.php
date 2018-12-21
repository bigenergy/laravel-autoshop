<?php

namespace App\Services\ProductType;


use App\Models\ProductType;
use App\Repositories\ProductType\ProductTypeRepository;

class ProductTypeService
{
    /**
     * @var ProductType
     */
    private $productTypeModel;
    /**
     * @var ProductTypeRepository
     */
    public $productTypeRepository;

    /**
     * ProductTypeService constructor.
     * @param ProductType $productTypeModel
     * @param ProductTypeRepository $productTypeRepository
     */
    public function __construct(ProductType $productTypeModel, ProductTypeRepository $productTypeRepository)
    {

        $this->productTypeModel = $productTypeModel;
        $this->productTypeRepository = $productTypeRepository;
    }

    /**
     * Adding new Product Type
     *
     * @param array $attributes
     * @return bool
     */
    public function add(array $attributes): bool
    {
        $createdProductType = $this->productTypeModel->fill($attributes);
        $createdProductType->save();

        return true;
    }

    /**
     * Updating product type
     *
     * @param int $id
     * @param array $attributes
     * @return bool
     */
    public function update(int $id, array $attributes): bool
    {
        /** @var ProductType $updatedProductType */
        $updatedProductType = $this->productTypeModel->find($id);
        $updatedProductType->fill($attributes);
        $updatedProductType->save();

        return true;
    }

    /**
     * Deleting product type
     *
     * @param int $id
     * @return bool
     */
    public function destroy(int $id): bool
    {
        $productTypeToDelete = $this->productTypeModel->findOrFail($id);
        $productTypeToDelete->delete();

        return true;
    }
}