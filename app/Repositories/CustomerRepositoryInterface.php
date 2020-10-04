<?php


namespace App\Repositories;

interface CustomerRepositoryInterface
{
    public function all();

    public function findById($customerId);
}
