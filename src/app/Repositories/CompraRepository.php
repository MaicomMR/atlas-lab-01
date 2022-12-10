<?php

namespace App\Repositories;


use App\Models\Compra;

class CompraRepository {


    public function all() 
    {
        $model = app(Compra::class);

        return $model->all();
    }

    public function findById(int $id)
    {
        $model = app(Compra::class);
        return $model->find($id); 
    }

    public function deleteById(int $id)
    {
        $model = app(Compra::class);
        $model->find($id)->delete();
    }
}