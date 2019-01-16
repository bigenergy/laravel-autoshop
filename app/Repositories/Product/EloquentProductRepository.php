<?php

namespace App\Repositories\Product;

use App\Models\Product;
use App\Repositories\AbstractRepository;

class EloquentProductRepository extends AbstractRepository implements ProductRepository
{
    /**
     * @var Product
     */
    private $model;

    /**
     * EloquentProductRepository constructor.
     * @param Product $product
     */
    public function __construct(Product $product)
    {
        $this->model = $product;
        parent::__construct($product);
    }

    /**
     * @param array $relations
     * @return mixed
     */
    public function getAll($relations = [])
    {
        return $this->model->with($relations)->orderBy('sort')->get();
    }

    /**
     * @param array $relations
     * @param int $perPage
     * @return mixed
     */
    public function getPaginated($relations = [], $perPage = 15)
    {
        return $this->model->with($relations)->orderBy('sort')->paginate($perPage);
    }

    /**
     * Get all products from selected category
     * @param $category
     * @param $request
     * @param int $perPage
     * @return mixed
     */
    public function getByCategory($category, $request, $perPage = 15)
    {
        $sorting = $request->get('sort');

        if ($sorting == 1) {
            /**
             * Sort 1 = По возрастанию цены (asc price)
             */
            $sortingParam = 'price';
            $sortingType = 'asc';
        }
        if ($sorting == 2) {
            /**
             * Sort 2 = По убыванию цены (desc price)
             */
            $sortingParam = 'price';
            $sortingType = 'desc';
        }
        if ($sorting == 3) {
            /**
             * Sort 3 = По наименованию (name of product)
             */
            $sortingParam = 'name';
            $sortingType = 'desc';
        }
        if ($sorting == 4) {
            /**
             * Sort 4 = По новинкам (new sellers)
             */
            $sortingParam = 'isNew';
            $sortingType = 'desc';
        }

        return $this->model->whereHas('productType', function($q) use ($category) {
            $q->where('type_id', $category)->where('disable', 0);
        })->orderBy($sortingParam ?? 'sort', $sortingType ?? 'asc')->paginate($perPage);

    }

    /**
     * Get products from selected catalog page (type)
     * @param array $relations
     * @param string $slug
     * @return mixed
     */
    public function getBySlug($relations = [], string $slug)
    {
        return $this->model->with($relations)->where('slug', '=', $slug)->first();
    }

    /**
     * @param array $relations
     * @return Product[]|\Illuminate\Database\Eloquent\Builder[]|\Illuminate\Database\Eloquent\Collection|mixed
     */
    public function getNewAll($relations = [])
    {
        return $this->model->with($relations)->where('isNew', 1)->get();
    }
}