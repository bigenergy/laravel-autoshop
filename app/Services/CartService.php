<?php

namespace App\Services;


use App\Models\Cart;
use App\Repositories\Cart\CartRepository;


class CartService
{

    /**
     * @var CartManager
     */
    private $cartManager;


    /**
     * ProductService constructor.
     * @param CartManager $cartManager
     */
    public function __construct(CartManager $cartManager)
    {

        $this->cartManager = $cartManager;
    }

    /**
     * Adds new product with relations
     * @param array $attributes
     */
    public function add(array $attributes)
    {
//        dd($attributes);
//        $addToCart = $this->cartModel->fill($attributes);
//        $addToCart->save();
//        $addToCart->items()->attach($attributes);

        //$this->cartManager->add($attributes);
        $this->cartManager->getCart();

    }

//    /**
//     * @param int $id
//     * @param array $attributes
//     * @return bool
//     */
//    public function update(int $id, array $attributes): bool
//    {
//        /** @var Brand $updatedBrand */
//        $updatedBrand = $this->brandModel->find($id);
//        $updatedBrand->fill($attributes);
//        $updatedBrand->save();
//
//        if(isset($attributes['image'])) {
//            $updatedBrand->addSingleImage($attributes['image']);
//        }
//
//        return true;
//    }
//
//    /**
//     * @param int $id
//     * @return bool
//     */
//    public function destroy(int $id): bool
//    {
//        $categoryToDelete = $this->brandModel->findOrFail($id);
//        $categoryToDelete->delete();
//
//        return true;
//    }
}