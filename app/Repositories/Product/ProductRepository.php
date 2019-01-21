<?php

namespace App\Repositories\Product;

use App\Repositories\Repository;

interface ProductRepository extends Repository
{
    /**
     * @param array $relations
     * @param string $slug
     * @return mixed
     */
    public function getBySlug($relations = [], string $slug);

    /**
     * @param array $relations
     * @return mixed
     */
    public function getNewAll($relations = []);

    /**
     * @param array $relations
     * @return mixed
     */
    public function getAll($relations = []);
}