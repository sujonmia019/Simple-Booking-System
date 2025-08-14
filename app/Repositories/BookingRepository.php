<?php

namespace App\Repositories;

use App\Interfaces\BookingInterface;
use App\Models\Booking;

class BookingRepository implements BookingInterface {

    public function getData(){
        $result = Booking::with([
            'user:id,full_name,email,phone_number',
            'service:id,name,price'
        ])->orderBy('created_at', 'DESC')->get();

        return $result;
    }

    public function statusUpdated(int $id, int $status)
    {
        Booking::findOrFail($id)->update(['status'=>$status]);
        return response()->json(['status'=>'success','message'=>'Booking status updated.']);
    }

}
