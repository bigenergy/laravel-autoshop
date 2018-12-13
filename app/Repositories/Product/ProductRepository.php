<?php

namespace App\Repositories\Product;

use App\Repositories\Repository;

interface ProductRepository extends Repository
{
    /**
     * Get all products from selected category
     * @param $category
     * @return mixed
     */
    public function getByCategory($category);

    /**
     * @param string $slug
     * @return mixed
     */
    public function getBySlug(string $slug);
}