<?php

namespace App\Repositories\Status;

use App\Models\Status;
use App\Repositories\AbstractRepository;

class EloquentStatusRepository extends AbstractRepository implements StatusRepository
{
    /**
     * @var Status
     */
    private $model;

    /**
     * EloquentProductRepository constructor.
     * @param Status $status
     */
    public function __construct(Status $status)
    {
        $this->model = $status;
        parent::__construct($status);
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
}