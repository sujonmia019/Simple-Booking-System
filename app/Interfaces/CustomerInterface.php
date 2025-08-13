<?php

namespace App\Interfaces;

interface CustomerInterface {

    public function getData();
    public function edit(int $id);
    public function udpate($request, int $id);
    public function view(int $id);
    public function delete(int $id);

}
