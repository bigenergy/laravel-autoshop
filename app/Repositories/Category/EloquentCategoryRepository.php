<?php

namespace App\Repositories\Category;

use App\Models\Category;
use App\Repositories\AbstractRepository;

class EloquentCategoryRepository extends AbstractRepository implements CategoryRepository
{
    /**
     * @var Category
     */
    private $model;

    /**
     * EloquentProductRepository constructor.
     * @param Category $category
     */
    public function __construct(Category $category)
    {
        $this->model = $category;
        parent::__construct($category);
    }

    /**
     * @param array $relations
     * @return mixed
     */
    public function getAll($relations = [])
    {
        return $this->model->with($relations)->all();
    }

    /**
     * @param array $relations
     * @param int $perPage
     * @return mixed
     */
    public function getPaginated($relations = [], $perPage = 15)
    {
        return $this->model->with($relations)->paginate($perPage);
    }

    /**
     * Get category where slug
     * @param string $slug
     * @return mixed
     */
    public function getBySlug(string $slug)
    {
        return $this->model->where('slug', '=', $slug)->first();
    }
}