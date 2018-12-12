<?php

namespace App\Services;


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

    /**
     * Adds new product with relations
     * @param array $attributes
     * @return bool
     */

}