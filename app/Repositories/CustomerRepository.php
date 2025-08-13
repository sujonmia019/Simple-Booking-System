<?php

namespace App\Repositories;

use App\Models\User;
use App\Interfaces\CustomerInterface;
use App\Traits\UploadAble;

class CustomerRepository implements CustomerInterface {

    use UploadAble;

    public function getData(){
        $result = User::role(CUSTOMER_ROLE)->orderBy('created_at', 'DESC')->get();
        return $result;
    }

    public function edit(int $id){
        $result = User::where(['role_name'=>CUSTOMER_ROLE,'id'=>$id])->firstOrFail();
        return $result;
    }

    public function udpate($request, int $id){
        $collection = collect($request->validated());
        $avatar = $request->old_avatar;
        if($request->hasFile('avatar')){
            $avatar = $this->uploadFile($request->file('avatar'), AVATAR_PATH);
        }
        $collection = $collection->merge(['updated_at'=>now(),'role_name'=>CUSTOMER_ROLE,'avatar'=>$avatar]);
        $result = User::findOrFail($id)->update($collection->all());
        if($result){
            $this->deleteFile($request->old_avatar);
            return redirect()->route('app.customers.index')->with('success','Customer udpated successfull.');
        }

        return back()->with('error','Customer cannot udpated.');
    }

    public function view(int $id){

    }

    public function delete(int $id){
        $data = User::where(['role_name'=>CUSTOMER_ROLE,'id'=>$id])->firstOrFail();
        $this->deleteFile($data->avatar);
        $data->delete();
    }

}
