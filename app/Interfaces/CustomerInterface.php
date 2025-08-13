<?php

namespace App\Interfaces;

interface CustomerInterface {

    public function getData();
    public function edit(int $id);
    public function delete(int $id);

}
