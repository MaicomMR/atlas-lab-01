<?php

namespace App\Repositories;

use App\Repositories\Contracts\ItemRepositoryInterface;
use App\Models\Item;

class ItemRepository extends AbstractRepository implements ItemRepositoryInterface {

    protected $model = Item::class;

    public function findById(int $id): Item
    {
        return $this->model::find($id);
    }

    public function findItensByListId($lista_id)
    {
        return $this->model::where('lista_id', $lista_id)->get();
    }
}