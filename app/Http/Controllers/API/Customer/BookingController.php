<?php

namespace App\Http\Controllers\API\Customer;

use App\Models\Booking;
use Illuminate\Http\Request;
use App\Http\Requests\BookRequest;
use App\Http\Controllers\Controller;
use App\Http\Resources\BookingResource;

class BookingController extends Controller
{
    /**
     * New Booking
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
     * Booking List
     */
    public function bookingList(){
        $bookings = Booking::with('service')->authBook()->sortBy('DESC')->get();

        return $this->responseJson('success','bookings retrieved successfully',BookingResource::collection($bookings));
    }
}
