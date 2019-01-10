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
     * @var Pages
     */
    private $pages;

    /**
     * EloquentPagesRepository constructor.
     * @param Pages $pages
     */
    public function __construct(Pages $pages)
    {
        $this->pages = $pages;
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
        return $this->model->with($relations)->paginate($perPage);
    }

    /**
     * @param int $id
     * @return Pages|\Illuminate\Database\Eloquent\Builder|mixed
     */
    public function getByTypeId(int $id)
    {
        return $this->model
            ->newQuery()
            ->where('product_type_id', $id)
            ->get();
    }
}