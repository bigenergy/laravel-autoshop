<?php

namespace App\Repositories\Cart;

use App\Models\Cart;
use App\Repositories\AbstractRepository;

class EloquentCartRepository extends AbstractRepository implements CartRepository
{
    /**
     * @var Cart
     */
    private $model;

    /**
     * EloquentProductRepository constructor.
     * @param Cart $cart
     */
    public function __construct(Cart $cart)
    {
        $this->model = $cart;
        parent::__construct($cart);
    }

    /**
     * @param array $relations
     * @return mixed
     */
    public function getAll($relations = [])
    {
        return $this->model->with($relations)->get();
    }

    /**
     * @param array $relations
     * @param int $perPage
     * @return mixed
     */
    public function getPaginated($relations = [], $perPage = 15)
    {
        return $this->model->with($relations)->orderBy('created_at', 'desc')->paginate($perPage);
    }

    /**
     * @param string $uuid
     * @return Cart|\Illuminate\Database\Eloquent\Builder|mixed
     */
    public function getByUUID($uuid)
    {
        return $this->model->with('cart')->where('uuid', '=', $uuid);
    }

//    public function getByCart($cart, $perPage = 1)
//    {
//        return $this->model->whereHas('categories', function($q) use ($cart) {
//            $q->where('cart_id', '=', $category->id);
//        })->paginate($perPage);
//    }


}