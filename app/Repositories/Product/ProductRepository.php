<?php

namespace App\Repositories\Product;

use App\Repositories\Repository;

interface ProductRepository extends Repository
{
    /**
     * Get all products from selected category
     * @param $category
     * @param $request
     * @return mixed
     */
    public function getByCategory($category, $request);

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
}