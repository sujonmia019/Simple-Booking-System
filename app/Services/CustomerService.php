<?php

namespace App\Services;

use App\Repositories\CustomerRepository;

class CustomerService {

    protected $customerRepo;

    public function __construct(CustomerRepository $customerRepository)
    {
        $this->customerRepo = $customerRepository;
    }

}
