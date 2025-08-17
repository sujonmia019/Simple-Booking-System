<?php

namespace App\Http\Controllers\API\Admin;

use App\Http\Controllers\Controller;
use App\Models\Booking;
use Illuminate\Http\Request;

class BookingController extends Controller
{
    public function index(){
        $data = Booking::with(['user:id,full_name','service:id,name,description,price'])->sortBy()->paginate(15);
        return $this->responseJson('success', 'bookings retrieved successfully', $data);
    }
}
