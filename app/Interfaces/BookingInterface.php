<?php

namespace App\Interfaces;

interface BookingInterface {

    public function getData();
    public function statusUpdated(int $id, int $status);

}
