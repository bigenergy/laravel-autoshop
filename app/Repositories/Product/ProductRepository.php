<?php

namespace App\Repositories\Product;

interface ProductRepository
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
     * Get all products from selected category
     * @param $category
     * @return mixed
     */
    public function getByCategory($category);

    public function getBySlug(string $slug);
}