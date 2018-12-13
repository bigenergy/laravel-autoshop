<?php

namespace App\Repositories;

use Illuminate\Database\Eloquent\Model;

abstract class AbstractRepository
{
    /**
     * @var Model
     */
    private $model;
    /**
     * AbstractRepository constructor.
     * @param Model $model
     */
    public function __construct(Model $model)
    {
        $this->model = $model;
    }

    public function getById(int $id)
    {
        return $this->model->find($id);
    }


}