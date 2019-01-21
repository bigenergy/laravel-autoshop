<?php

namespace App\Services\Product;

use App\Models\Product;
use App\Repositories\Product\ProductRepository;

class ProductService
{
    /**
     * @var Product
     */
    private $productModel;
    /**
     * @var ProductRepository
     */
    public $repository;

    /**
     * ProductService constructor.
     * @param Product $productModel
     * @param ProductRepository $productRepository
     */
    public function __construct(Product $productModel, ProductRepository $productRepository)
    {
        $this->productModel = $productModel;
        $this->repository = $productRepository;
    }

    /**
     * Adds new product with relations
     * @param array $attributes
     * @return bool
     */
    public function add(array $attributes): bool
    {
        \DB::beginTransaction();
        /** @var Product $createdProduct */
        $createdProduct = $this->productModel->create($attributes);

        $createdProduct->syncCategories($attributes['categories']);
        $createdProduct->syncProps($attributes['attributes']);

        if (isset($attributes['images'])) {
            $createdProduct->addImages($attributes['images']);
        }

        \DB::commit();

        return true;
    }


    /**
     * @param int $id
     * @param array $attributes
     * @return bool
     */
    public function update(int $id, array $attributes): bool
    {
        /** @var Product $updatedProduct */
        $updatedProduct = $this->productModel->find($id);
        $updatedProduct->fill($attributes)->save();
        $updatedProduct->syncCategories($attributes['categories']);
        $updatedProduct->syncProps($attributes['attributes']);

        if (isset($attributes['images'])) {
            $updatedProduct->addImages($attributes['images']);
        }

        return true;
    }

    /**
     * @param int $id
     * @return bool
     * @throws \Exception
     */
    public function destroy(int $id): bool
    {
        /** @var Product $productToDelete */
        $productToDelete = $this->productModel->findOrFail($id);
        $productToDelete->delete();
        $productToDelete->categories()->detach($id);

        return true;
    }
}