<?php

namespace App\Http\Controllers\API\Customer;

use App\Models\Booking;
use Illuminate\Http\Request;
use App\Http\Requests\BookRequest;
use App\Http\Controllers\Controller;
use App\Http\Resources\BookingResource;
use OpenApi\Annotations as OA;

/**
 * @OA\Tag(
 *     name="Customer",
 *     description="Customer Booking endpoints"
 * )
 */
class BookingController extends Controller
{
    /**
     * @OA\Post(
     *     path="/api/v1/customer/bookings",
     *     tags={"Customer"},
     *     summary="Add a new booking",
     *     security={{"sanctum":{}}},
     *     @OA\RequestBody(
     *         required=true,
     *         @OA\JsonContent(
     *             required={"service_id","booking_date"},
     *             @OA\Property(property="service_id", type="integer"),
     *             @OA\Property(property="booking_date", type="string", format="date")
     *         )
     *     ),
     *     @OA\Response(response=201, description="Booking created successfully")
     * )
     */
    public function addBooking(BookRequest $request){
        try {
            $user_id = auth()->id();
            $data = Booking::create(['user_id'=>$user_id,'service_id'=>$request->service_id,'booking_date'=>$request->booking_date]);
            // load the service relationship
            $data->load('service');

            return $this->responseJson('success','Booking created successfully',new BookingResource($data), 201);
        } catch (\Exception $e) {
            return $this->responseJson('error','Something went wrong. Please try again later!',null, 404);
        }
    }

    /**
     * @OA\Get(
     *     path="/api/v1/customer/bookings",
     *     tags={"Customer"},
     *     summary="List customer's bookings",
     *     security={{"sanctum":{}}},
     *     @OA\Response(response=200, description="List of bookings")
     * )
     */
    public function bookingList(){
        $bookings = Booking::with('service')->authBook()->sortBy('DESC')->get();

        return $this->responseJson('success','Bookings retrieved successfully',BookingResource::collection($bookings));
    }
}
