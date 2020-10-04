<?php

namespace App\Repositories;

use App\Models\Customer;


class CustomerRepository
{
    public function all()
    {
        return Customer::orderBy('name')
            ->where('active', 1)
            ->with('user')
            ->get()
            ->map(function ($customer) {
                return [
                    'customer_id' => $customer->id,
                    'name' => $customer->name,
                    'created_by' => $customer->user->email,
                    'last_updated' => $customer->updated_at->diffForHumans(),
                ];
            });
    }
    public function findById($customerId)
    {
        return Customer::where('id', $customerId)
            ->where('active', 1)
            ->with('user')
            ->firstOrFail();
    }

    public function findByUsername()
    {
        # code...
    }
}
