<?php

namespace App\Http\Controllers\API\Admin;

use App\Models\Service;
use App\Http\Controllers\Controller;
use App\Http\Resources\ServiceResource;
use App\Http\Requests\API\ServiceRequest;

class ServiceController extends Controller
{
    public function store(ServiceRequest $request){
        $collection = collect($request->validated());
        $data = Service::create($collection->all());
        if($data){
            return $this->responseJson('success', 'Service saved successfull.', new ServiceResource($data),201);
        }

        return $this->responseJson('error', 'Service cannot saved successfull.');
    }

    public function update(ServiceRequest $request, int $id){
        $collection = collect($request->validated());
        $data = Service::find($id);
        if($data){
            $data->update($collection->all());
            return $this->responseJson('success', 'Service updated successfull.', new ServiceResource($data));
        }

        return $this->responseJson('error', 'Service cannot updated successfull.');
    }

    public function destroy(int $id){
        $data = Service::find($id);
        if($data){
            $data->delete();
            return $this->responseJson('success', 'Service deleted successfull.');
        }

        return $this->responseJson('error', 'Service cannot deleted successfull.');
    }

}
