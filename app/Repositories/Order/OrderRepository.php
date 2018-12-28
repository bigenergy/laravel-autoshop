<?php

namespace App\Repositories\Order;

use Illuminate\Support\Collection;

/**
 * @method getById(int $id)
 */
interface OrderRepository
{
    /**
     * @return mixed
     */
    public function getAll();

    /**
     * @param array $relations
     * @param int $perPage
     * @return mixed
     */
    public function getPaginated($relations =[], $perPage = 15);

    /**
     * Get order items
     * @param $id
     * @return mixed
     */
    public function getOrderItems(int $id): Collection;
}