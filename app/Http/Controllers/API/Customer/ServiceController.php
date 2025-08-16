<?php

namespace App\Http\Controllers\API\Customer;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\ServiceResource;
use App\Models\Service;

class ServiceController extends Controller
{
    public function serviceList(){
        $services = Service::status(ACTIVE_STATUS)->sortBy('DESC')->get();

        return $this->responseJson('success','Services retrieved successfully',ServiceResource::collection($services));
    }
}
