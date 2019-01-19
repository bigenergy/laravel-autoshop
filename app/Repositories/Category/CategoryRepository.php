<?php

namespace App\Repositories\Category;

interface CategoryRepository
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
     * Find a category by slug
     * @param string $slug
     * @return mixed
     */
    public function getBySlug(string $slug);

    /**
     * @param array $relations
     * @return mixed
     */
    public function getAllWithCount($relations =[]);
}