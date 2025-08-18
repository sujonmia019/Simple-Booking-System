<?php

namespace App\Http\Controllers\API\Customer;

use App\Http\Controllers\Controller;
use App\Http\Resources\ServiceResource;
use App\Models\Service;
use OpenApi\Annotations as OA;

/**
 * @OA\Tag(
 *     name="Customer",
 *     description="Customer endpoints"
 * )
 */
class ServiceController extends Controller
{
    /**
     * @OA\Get(
     *     path="/api/v1/customer/services",
     *     tags={"Customer"},
     *     summary="List available services",
     *     security={{"sanctum":{}}},
     *     @OA\Response(response=200, description="List of services")
     * )
     */
    public function serviceList(){
        $services = Service::status(ACTIVE_STATUS)->sortBy('DESC')->get();

        return $this->responseJson('success','Services retrieved successfully',ServiceResource::collection($services));
    }
}
