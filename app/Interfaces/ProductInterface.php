<?php

namespace App\Interfaces;

interface ProductInterface {

    public function getData();
    public function storeOrUpdateData($data);
    public function edit(int $id);
    public function delete(int $id);

}
