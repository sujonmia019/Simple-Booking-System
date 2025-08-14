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
        $collection = collect($request->validated());
        $created_at = $updated_at = now();
        $collection = $request->update_id ? $collection->merge(['updated_at'=>$updated_at]) : $collection->merge(['created_at'=>$created_at]);
        $result = Service::updateOrCreate(['id'=>$request->update_id], $collection->all());
        if($result){
            $msg = $request->update_id ? 'Service updated successfull.' : 'Service saved successfull.';
            return redirect()->route('app.services.index')->with('success', $msg);
        }

        return back()->with('error','Something went wrong!');
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
