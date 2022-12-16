<?php

namespace App\Repositories;

use App\Models\Lista;
use App\Repositories\Contracts\ListaRepositoryInterface;

class ListaRepository extends AbstractRepository implements ListaRepositoryInterface {

    protected $model = Lista::class;

    public function showAllLists()
    {
        return $this->model::all();
    }


    public function findById($id)
    {
       return $this->model::where('id', $id)->first();
    }

}
