<?php

namespace App;

use Illuminate\Database\Eloquent\Builder;

class CatalogFilter extends QueryFilters
{
    /**
     * Sorting filter (price, name, isNew)
     *
     * @param string $column
     * @param string $sort
     * @return Builder
     */
    public function sort($column = 'sort', $sort = 'desc')
    {
        return $this->builder->orderBy($column, $sort);
    }

    /**
     * Filter by difficulty.
     *
     * @param  string $level
     * @return Builder
     */
    public function difficulty($level)
    {
        return $this->builder->where('difficulty', $level);
    }

    /**
     * Filter by length.
     *
     * @param  string $order
     * @return Builder
     */
    public function sort_type($order = 'asc')
    {
        return $this->builder->orderBy('length', $order);
    }
}