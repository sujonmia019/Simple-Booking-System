<?php

namespace App\Repositories;

use App\Interfaces\ProductInterface;
use App\Models\Service;

class ProductRepository implements ProductInterface {

    public function getData(){
        $result = Service::orderBy('created_at', 'DESC')->get();
        return $result;
    }

    public function storeOrUpdateData($request){

    }

    public function edit(int $id){
        $result = Service::findOrFail($id);
        return $result;
    }

    public function delete(int $id){
        $data = Service::findOrFail($id);
        $data->delete();
    }
}
