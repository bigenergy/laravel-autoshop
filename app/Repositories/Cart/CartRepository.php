<?php

namespace App\Repositories\Cart;

interface CartRepository
{
    /**
     * @return mixed
     */
    public function getAll();

    /**
     * @param int $id
     * @return mixed
     */
    public function getById(int $id);

    /**
     * @param array $relations
     * @param int $perPage
     * @return mixed
     */
    public function getPaginated($relations =[], $perPage = 15);

    /**
     * Get cart by uuid
     * @param array $relations
     * @param string $uuid
     * @return mixed
     */
    public function getByUUID($uuid);


}