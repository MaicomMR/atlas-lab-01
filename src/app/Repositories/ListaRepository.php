<?php

namespace App\Repositories;

use App\Models\Lista;

class ListaRepository {

    public function all()
    {
        return Lista::all();
    }

    public function findById(int $id): Lista
    {
        return Lista::find($id);
    }

}
