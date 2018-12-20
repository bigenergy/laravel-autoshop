<?php

namespace App\Repositories\Order;

interface OrderRepository
{
    /**
     * @return mixed
     */
    public function getAll();

    /**
     * @param array $relations
     * @param int $id
     * @return mixed
     */
    public function getById2($relations = [], int $id);

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
    public function getOrderItems($id);
}