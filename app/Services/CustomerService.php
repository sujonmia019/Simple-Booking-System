<?php

namespace App\Services;

use App\Repositories\CustomerRepository;

class CustomerService {

    protected $customerRepo;

    public function __construct(CustomerRepository $customerRepository)
    {
        $this->customerRepo = $customerRepository;
    }

    public function all(){
        return $this->customerRepo->getData();
    }

    public function find(int $id){
        return $this->customerRepo->edit($id);
    }

    public function deleteData(int $id){
        return $this->customerRepo->delete($id);
    }

}
