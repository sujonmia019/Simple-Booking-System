<?php

namespace App\Services;

use App\Repositories\ProductRepository;

class ProductService {

    protected $productRepo;

    public function __construct(ProductRepository $productRepository)
    {
        $this->productRepo = $productRepository;
    }

    public function all(){
        return $this->productRepo->getData();
    }

    public function find(int $id){
        return $this->productRepo->edit($id);
    }

    public function deleteData(int $id){
        return $this->productRepo->delete($id);
    }

}
