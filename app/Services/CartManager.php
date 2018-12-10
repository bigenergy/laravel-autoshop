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
     * CartManager constructor.
     * @param Cart $cartModel
     */
    public function __construct(Cart $cartModel)
    {
        $this->cartModel = $cartModel;
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

    public function deleteProductFromCart($productId)
    {
       // $itemToDelete = $this->cartModel->with('cartItems')->findOrFail($productId);



        //$productToDelete = $this->cartModel->cartItems()->findOrFail($productId);
        //$productToDelete->delete();
       CartItem::find($productId)->delete();
    }

}