<?php

namespace App\Services;


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
        $createdProduct = $this->productModel->fill($attributes);
        $createdProduct->save();
        $createdProduct->categories()->attach($attributes['categories']);

        if(isset($attributes['images'])) {
            $createdProduct->addImages($attributes['images']);
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
        /** @var Product $updatedProduct */
        $updatedProduct = $this->productModel->find($id);
        $updatedProduct->fill($attributes);
        $updatedProduct->save();
        $updatedProduct->categories()->sync($attributes['categories']);

        if(isset($attributes['images'])) {
            $updatedProduct->addImages($attributes['images']);
        }

        return true;
    }

    /**
     * @param int $id
     * @return bool
     */
    public function destroy(int $id): bool
    {
        $productToDelete = $this->productModel->findOrFail($id);
        $productToDelete->delete();
        $productToDelete->categories()->detach($id);

        return true;
    }
}