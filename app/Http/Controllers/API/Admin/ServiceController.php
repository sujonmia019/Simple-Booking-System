<?php

namespace App\Http\Controllers\API\Admin;

use App\Models\Service;
use App\Http\Controllers\Controller;
use App\Http\Resources\ServiceResource;
use App\Http\Requests\API\ServiceRequest;
use OpenApi\Annotations as OA;

/**
 * @OA\Tag(
 *     name="Admin",
 *     description="Admin Service Management"
 * )
 */
class ServiceController extends Controller
{
    /**
     * @OA\Post(
     *     path="/api/v1/admin/services",
     *     tags={"Admin"},
     *     summary="Create a new service",
     *     security={{"sanctum":{}}},
     *     @OA\RequestBody(
     *         required=true,
     *         @OA\JsonContent(
     *             required={"name","price","status"},
     *             @OA\Property(property="name", type="string"),
     *             @OA\Property(property="description", type="string"),
     *             @OA\Property(property="price", type="number"),
     *             @OA\Property(property="status", type="string")
     *         )
     *     ),
     *     @OA\Response(response=201, description="Service created")
     * )
     */
    public function store(ServiceRequest $request){
        $collection = collect($request->validated());
        $data = Service::create($collection->all());
        if($data){
            return $this->responseJson('success', 'Service saved successfull.', new ServiceResource($data),201);
        }

        return $this->responseJson('error', 'Service cannot saved successfull.');
    }

    /**
     * @OA\Put(
     *     path="/api/v1/admin/services/{id}",
     *     tags={"Admin"},
     *     summary="Update a service",
     *     security={{"sanctum":{}}},
     *     @OA\Parameter(name="id", in="path", required=true, @OA\Schema(type="integer")),
     *     @OA\RequestBody(
     *         required=true,
     *         @OA\JsonContent(
     *             @OA\Property(property="name", type="string"),
     *             @OA\Property(property="description", type="string"),
     *             @OA\Property(property="price", type="number"),
     *             @OA\Property(property="status", type="string")
     *         )
     *     ),
     *     @OA\Response(response=200, description="Service updated")
     * )
     */
    public function update(ServiceRequest $request, int $id){
        $collection = collect($request->validated());
        $data = Service::find($id);
        if($data){
            $data->update($collection->all());
            return $this->responseJson('success', 'Service updated successfull.', new ServiceResource($data));
        }

        return $this->responseJson('error', 'Service cannot updated successfull.');
    }

    /**
     * @OA\Delete(
     *     path="/api/v1/admin/services/{id}",
     *     tags={"Admin"},
     *     summary="Delete a service",
     *     security={{"sanctum":{}}},
     *     @OA\Parameter(name="id", in="path", required=true, @OA\Schema(type="integer")),
     *     @OA\Response(response=200, description="Service deleted")
     * )
     */
    public function destroy(int $id){
        $data = Service::find($id);
        if($data){
            $data->delete();
            return $this->responseJson('success', 'Service deleted successfull.');
        }

        return $this->responseJson('error', 'Service cannot deleted successfull.');
    }

}
