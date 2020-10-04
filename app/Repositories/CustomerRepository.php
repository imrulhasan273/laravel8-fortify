<?php

namespace App\Repositories;

use App\Models\Customer;


class CustomerRepository implements CustomerRepositoryInterface
{
    public function all()
    {
        return Customer::orderBy('name')
            ->where('active', 1)
            ->with('user')
            ->get()
            ->map->format();
    }


    public function findById($customerId)
    {
        return Customer::where('id', $customerId)
            ->where('active', 1)
            ->with('user')
            ->firstOrFail()->format();
    }
}
