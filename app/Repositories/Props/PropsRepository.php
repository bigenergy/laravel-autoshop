<?php

namespace App\Repositories\Props;

interface PropsRepository
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
     * @param int $id
     * @return mixed
     */
    public function getByTypeId(int $id);

    /**
     * @param array $relation
     * @param int $productType
     * @return mixed
     */
    public function getFilterProps($relation = [], int $productType);
}
