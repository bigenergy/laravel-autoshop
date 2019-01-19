<?php

namespace App\Repositories\Brand;

interface BrandRepository
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
     * @param array $relations
     * @param $currentType
     * @return mixed
     */
    public function getAllWithCount($relations = [], $currentType);
}