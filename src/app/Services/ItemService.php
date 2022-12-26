<?php

namespace App\Services;

use App\Repositories\Contracts\ItemRepositoryInterface;
use App\Services\Contracts\ItemServiceInterface;

class ItemService implements ItemServiceInterface {

    protected ItemRepositoryInterface $itemRepository;

    public function __construct(
        ItemRepositoryInterface $itemRepository
    ) {
        $this->itemRepository = $itemRepository;  
    }

    public function adicionarMaisItens($id, $quantidade)
    {
        if(!$this->itemRepository->findById($id)){
            return "Item não encontrado";
        }

        $item = $this->itemRepository->findById($id);

        $item->quantidade += $quantidade;
        $item->save();
    }

}