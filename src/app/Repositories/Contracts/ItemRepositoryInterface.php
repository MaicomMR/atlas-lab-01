<?php

namespace App\Repositories\Contracts;

interface ItemRepositoryInterface {

    public function all();

    public function findById(int $id);

    public function findItensByListId($lista_id);
}