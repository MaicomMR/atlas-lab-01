<?php

namespace App\Services;

use App\Repositories\Contracts\ListaRepositoryInterface;
use App\Services\Contracts\ListServiceInterface;


class ListService implements ListServiceInterface {

    protected ListaRepositoryInterface $listaRepository;

    public function __construct(
        ListaRepositoryInterface $listaRepository
    ) {
        $this->listaRepository = $listaRepository;  
    }

    public function deleteList($id)
    {
        $lista = $this->listaRepository->findById($id);
        $lista->delete();
    }

    public function saveNewData($id, $newData)
    {
        $lista = $this->listaRepository->findById($id);

        $lista->nome = $newData['nome'];
        $lista->descricao = $newData['descricao'];
        $lista->save();
    }
}