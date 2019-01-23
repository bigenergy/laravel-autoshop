<?php

namespace App\Repositories\Pages;


use App\Models\Pages;
use App\Repositories\AbstractRepository;

class EloquentPagesRepository extends AbstractRepository implements PagesRepository
{
    /**
     * @var Pages
     */
    private $model;

    /**
     * EloquentPagesRepository constructor.
     * @param Pages $pages
     */
    public function __construct(Pages $pages)
    {
        $this->model = $pages;
        parent::__construct($pages);
    }

    /**
     * @param array $relations
     * @return mixed
     */
    public function getAll($relations = [])
    {
        return $this->model->with($relations)->get();
    }

    /**
     * @param array $relations
     * @param int $perPage
     * @return mixed
     */
    public function getPaginated($relations = [], $perPage = 15)
    {
        return $this->model->with($relations)->orderBy('created_at', 'desc')->paginate($perPage);
    }

    /**
     * @param string $slug
     * @return Pages|\Illuminate\Database\Eloquent\Builder|mixed
     */
    public function getBySlug(string $slug)
    {
        return $this->model
            ->newQuery()
            ->where('slug', $slug)
            ->where('isPrivate', 0)
            ->firstOrFail();
    }
}