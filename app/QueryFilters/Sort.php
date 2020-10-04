<?php

namespace App\QueryFilters;

class Sort extends Filter
{
    protected function applyFilter($builder)
    {
        return $builder->orderBy('title', request($this->filterName()));
    }
}
