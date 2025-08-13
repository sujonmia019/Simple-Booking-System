<?php

namespace App\Repositories;

use App\Models\User;
use App\Interfaces\CustomerInterface;

class CustomerRepository implements CustomerInterface {

    public function getData(){
        $result = User::role(CUSTOMER_ROLE)->orderBy('created_at', 'DESC')->get();
        return $result;
    }

    public function edit(int $id){
        $result = User::where(['role_name'=>CUSTOMER_ROLE,'id'=>$id])->firstOrFail();
        return $result;
    }

    public function delete(int $id){
        $data = User::where(['role_name'=>CUSTOMER_ROLE,'id'=>$id])->firstOrFail();
        $data->delete();
    }

}
