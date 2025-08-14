<?php

namespace App\Services;

use App\Repositories\BookingRepository;

class BookingService {

    protected $bookingRepo;

    public function __construct(BookingRepository $bookingRepository)
    {
        $this->bookingRepo = $bookingRepository;
    }

    public function all(){
        return $this->bookingRepo->getData();
    }

    public function status(int $id, int $status){
        return $this->bookingRepo->statusUpdated($id, $status);
    }


}
