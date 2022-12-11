<?php

namespace App\Repositories;

use App\Models\Lista;

class ListaRepository {

    public function all()
    {
        $model = app(Lista::class);

        return $model->all();
    }
}
