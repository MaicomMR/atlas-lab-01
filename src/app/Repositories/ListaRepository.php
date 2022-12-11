<?php

namespace App\Repositories;

use App\Models\Lista;
use App\Repositories\Contracts\ListaRepositoryInterface;

class ListaRepository extends AbstractRepository implements ListaRepositoryInterface {

    protected $model = Lista::class;

    public function findById(int $id): Lista
    {
        return Lista::find($id);
    }

}
