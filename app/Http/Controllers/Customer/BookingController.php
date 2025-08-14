<?php

namespace App\Http\Controllers\Customer;

use App\Http\Controllers\Controller;
use App\Http\Requests\BookRequest;
use App\Models\Booking;
use Illuminate\Http\Request;

class BookingController extends Controller
{

    public function bookNow(BookRequest $request){
        if($request->ajax()){
            $user_id = auth()->id();
            $result = Booking::create(['user_id'=>$user_id,'service_id'=>$request->service_id,'booking_date'=>$request->booking_date]);
            if($result){
                return response()->json(['status'=>'success','message'=>'Your booking has been confirmed successfully']);
            }

            return response()->json(['status'=>'error','message'=>'Please try again later!']);
        }
    }

}
