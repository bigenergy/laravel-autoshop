<?php

namespace App\Services\Props;


use App\Models\Props;
use App\Repositories\Props\PropsRepository;

class PropsService
{

    /**
     * @var PropsRepository
     */
    public $propsRepository;

    /**
     * @var Props
     */
    private $propsModel;

    /**
     * ProductService constructor.
     * @param Props $propsModel
     * @param PropsRepository $propsRepository
     */
    public function __construct(Props $propsModel, PropsRepository $propsRepository)
    {
        $this->propsModel = $propsModel;
        $this->propsRepository = $propsRepository;
    }

    public function add(array $attributes): bool
    {
        $createdStatus = $this->propsModel->fill($attributes);
        $createdStatus->save();

        return true;
    }

    public function update(int $id, array $attributes): bool
    {
        /** @var Props $updatedProps */
        $updatedProps = $this->propsModel->find($id);
        $updatedProps->fill($attributes);
        $updatedProps->save();

        return true;
    }

    public function destroy(int $id): bool
    {
        $statusToDelete = $this->propsModel->findOrFail($id);
        $statusToDelete->delete();

        return true;
    }
}