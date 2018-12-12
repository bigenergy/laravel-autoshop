<?php

namespace App\Services\Status;


use App\Models\Status;
use App\Repositories\Status\StatusRepository;

class StatusService
{
    /**
     * @var Status
     */
    private $statusModel;

    /**
     * @var StatusRepository
     */
    public $statusRepository;

    /**
     * ProductService constructor.
     * @param Status $statusModel
     * @param StatusRepository $statusRepository
     */
    public function __construct(Status $statusModel, StatusRepository $statusRepository)
    {
        $this->statusModel = $statusModel;
        $this->statusRepository = $statusRepository;
    }

    public function add(array $attributes): bool
    {
        $createdStatus = $this->statusModel->fill($attributes);
        $createdStatus->save();

        return true;
    }

    public function update(int $id, array $attributes): bool
    {
        /** @var Status $updatedStatus */
        $updatedStatus = $this->statusModel->find($id);
        $updatedStatus->fill($attributes);
        $updatedStatus->save();

        return true;
    }

    public function destroy(int $id): bool
    {
        $statusToDelete = $this->statusModel->findOrFail($id);
        $statusToDelete->delete();

        return true;
    }
}