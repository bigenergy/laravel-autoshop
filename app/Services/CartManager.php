<?php

namespace App\Services;


use App\Models\Cart;
use App\Models\CartItem;
use App\Repositories\Cart\CartRepository;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Facades\Hash;

class CartManager
{
    /**
     * @var Cart
     */
    private $cartModel;
    /**
     * @var CartRepository
     */
    private $repository;
    /**
     * @var CartItem
     */
    private $cartItem;

    public function __construct(Cart $cartModel, CartItem $cartItem, CartRepository $cartRepository)
    {
        $this->cartModel = $cartModel;
        $this->repository = $cartRepository;
        $this->cartItem = $cartItem;
    }

    public function getCart()
    {
        $cookie = Cookie::get('cart_hash');

        if($cookie) {
            $getCurrentCart = CartManager::getCartByCookie($cookie);
            return dd($getCurrentCart);
        } else {
            CartManager::writeCookie();
        }
    }

    public function writeCookie()
    {
        // write to cookies
        $random_hash = Hash::make(str_random(32));
        Cookie::queue('cart_hash', $random_hash);

        // write to database table
        $attributes = array('uuid' => $random_hash);
        $writeHash = $this->cartModel->fill($attributes);
        $writeHash->save();

        return true;
    }

    public function getCartByCookie($cookie)
    {
        return $this->cartModel->where('uuid', '=', $cookie)->first();
    }

}