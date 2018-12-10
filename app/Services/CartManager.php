<?php

namespace App\Services;


use App\Models\Cart;
use App\Models\CartItem;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Cookie;

class CartManager
{
    /**
     * @var Cart
     */
    private $cartModel;
    /**
     * @var CartItem
     */
    private $cartItem;

    /**
     * CartManager constructor.
     * @param Cart $cartModel
     * @param CartItem $cartItem
     */
    public function __construct(Cart $cartModel, CartItem $cartItem)
    {
        $this->cartModel = $cartModel;
        $this->cartItem = $cartItem;
    }

    /**
     * Returns current cart
     *
     * @return Cart
     */
    public function getCart()
    {
        $cartHash = $this->getCurrentCartHash();

        return $this->getCartByHash($cartHash);
    }

    /**
     * Returns cart hash from cookie
     *
     * @return string
     */
    private function getCurrentCartHash() : string
    {
        $cartHash = Cookie::get('cart_hash');

        if (is_null($cartHash)) {
            $cartHash = Hash::make(str_random(32));
            $this->storeHashToCookie($cartHash);
        }

        return $cartHash;
    }

    /**
     * Store cart hash to cookie
     *
     * @param string $hash
     */
    private function storeHashToCookie(string $hash)
    {
        Cookie::queue('cart_hash', $hash);
    }

    /**
     * Returns cart by hash
     *
     * @param $cartHash
     * @return Cart
     */
    private function getCartByHash($cartHash)
    {
        return $this->cartModel->firstOrCreate([
            'uuid' => $cartHash
        ]);
    }

    public function getCartFromItem($productId)
    {
        return $this->cartModel->where('product_id', '=', $productId);
    }

    /**
     * Deleting product from cart
     *
     * @param $productId
     */
    public function deleteProductFromCart($productId)
    {
        $productToDelete = $this->cartItem->findOrFail($productId);
        $productToDelete->delete();
    }
}