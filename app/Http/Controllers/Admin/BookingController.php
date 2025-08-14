<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Services\BookingService;
use App\Http\Controllers\Controller;

class BookingController extends Controller
{
    protected $service;

    public function __construct(BookingService $bookingService)
    {
        $this->service = $bookingService;
    }


    public function index(){
        $bookings = $this->service->all();

        $this->setPageTitle('Booking List', 'Booking List');
        return view('admin.booking.index', ['bookings'=>$bookings]);
    }

    public function stautsChange(Request $request){
        if($request->ajax()){
            return $this->service->status($request->id, $request->status);
        }
    }
}
