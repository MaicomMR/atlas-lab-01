<?php

namespace App\Repositories;


use App\Models\Compra;

class CompraRepository {


    public function all() 
    {
        $model = app(Compra::class);

        return $model->all();
    }

    public function findById(int $id): Compra
    {
        return Compra::find($id);
    }
}