<?php

namespace App\Repositories;

use App\Repositories\Contracts\CompraRepositoryInterface;
use App\Models\Compra;

class CompraRepository extends AbstractRepository implements CompraRepositoryInterface {

    protected $model = Compra::class;

    public function findById(int $id): Compra
    {
        return Compra::find($id);
    }
}