<?php

namespace App\QueryFilters;

class MaxCount extends Filter
{
    protected function applyFilter($builder)
    {
        return $builder->take(request($this->filterName()));
    }
}
