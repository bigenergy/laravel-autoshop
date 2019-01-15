<?php

namespace App\Repositories\ProductType;

interface ProductTypeRepository
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
     * @param string $slug
     * @return mixed
     */
    public function getBySlug(string $slug);

}