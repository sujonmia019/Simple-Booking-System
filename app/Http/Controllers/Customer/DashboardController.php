<?php

namespace App\Http\Controllers\Customer;

use App\Models\Booking;
use App\Models\Service;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class DashboardController extends Controller
{
    public function dashboard(){
        // services
        $data['services'] = Service::status(ACTIVE_STATUS)->sortBy()->get();

        // booking history
        $data['histories'] = Booking::with('service:id,name')->authBook()->sortBy()->get();

        $this->setPageTitle('Portal', 'Portal');
        return view('customer.dashboard', $data);
    }
}
