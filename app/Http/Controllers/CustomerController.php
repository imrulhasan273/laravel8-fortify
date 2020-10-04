<?php

namespace App\Http\Controllers;

use App\Repositories\CustomerRepositoryInterface;

class CustomerController extends Controller
{
    private $customerRepository;

    public function __construct(CustomerRepositoryInterface $customerRepository)
    {
        $this->customerRepository = $customerRepository;
    }

    public function index()
    {
        $customers = $this->customerRepository->all();

        return $customers;
    }


    public function show($customerId)
    {
        $customer = $this->customerRepository->findById($customerId);

        return $customer;
    }
}
