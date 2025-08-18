<?php

namespace App\Http\Controllers\API\Admin;

use App\Http\Controllers\Controller;
use App\Models\Booking;
use Illuminate\Http\Request;
use OpenApi\Annotations as OA;

/**
 * @OA\Tag(
 *     name="Admin",
 *     description="Admin Booking Management"
 * )
 */
class BookingController extends Controller
{
    /**
     * @OA\Get(
     *     path="/api/v1/admin/bookings",
     *     tags={"Admin"},
     *     summary="List all bookings",
     *     security={{"sanctum":{}}},
     *     @OA\Response(response=200, description="All bookings")
     * )
     */
    public function index(){
        $data = Booking::with(['user:id,full_name','service:id,name,description,price'])->sortBy()->paginate(15);
        return $this->responseJson('success', 'bookings retrieved successfully', $data);
    }
}
