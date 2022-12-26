<?php

namespace App\Services\Contracts;

interface ListServiceInterface {
    
    public function deleteList($id);

    public function saveNewData($id, $newData);
}