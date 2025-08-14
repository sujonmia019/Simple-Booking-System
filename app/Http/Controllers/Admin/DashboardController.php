<?php

namespace App\Http\Controllers\Admin;

use App\Models\Booking;
use App\Models\Service;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Models\User;

class DashboardController extends Controller
{

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function dashboard()
    {
        // Services counts
        $servicesCounts = Service::selectRaw('
            COUNT(*) as total,
            SUM(CASE WHEN status = 1 THEN 1 ELSE 0 END) as active
        ')->first();

        // Bookings counts
        $bookingsCounts = Booking::selectRaw('
            COUNT(*) as total,
            SUM(CASE WHEN status = 1 THEN 1 ELSE 0 END) as pending,
            SUM(CASE WHEN status = 2 THEN 1 ELSE 0 END) as confirmed,
            SUM(CASE WHEN status = 3 THEN 1 ELSE 0 END) as cancelled
        ')->first();

        // Total Revenue
        $totalRevenue = Booking::where('bookings.status', 2)
            ->join('services', 'bookings.service_id', '=', 'services.id')
            ->sum('services.price');

        // Booking trend by month
        $bookingTrend = Booking::select(
                DB::raw('DATE_FORMAT(booking_date, "%Y-%m") as month'),
                DB::raw('COUNT(*) as total')
            )
            ->groupBy('month')
            ->orderBy('month')
            ->get();

        // Total customers
        $totalCustomers = User::role(CUSTOMER_ROLE)->count();

        // Service popularity
        $servicePopularity = Booking::join('services', 'bookings.service_id', '=', 'services.id')
            ->select('services.name', DB::raw('COUNT(bookings.id) as total'))
            ->groupBy('services.name')
            ->orderBy('total','DESC')
            ->get();

        // Booking status distribution
        $bookingStatusDist = Booking::select(
                DB::raw("CASE
                    WHEN status = 1 THEN 'Pending'
                    WHEN status = 2 THEN 'Confirmed'
                    WHEN status = 3 THEN 'Cancelled'
                    END as status_label"),
                DB::raw('COUNT(*) as total')
            )
            ->groupBy('status')
            ->get();

        $this->setPageTitle('Dashboard', 'Dashboard', 'Welcome back, manage your service bookings');
        return view('home', compact(
            'servicesCounts',
            'bookingsCounts',
            'totalRevenue',
            'totalCustomers',
            'bookingTrend',
            'servicePopularity',
            'bookingStatusDist'
        ));

    }
}
