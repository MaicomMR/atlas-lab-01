<?php

namespace App\Http\Controllers\ListaControllers;

use App\Http\Controllers\Controller;
use App\Repositories\Contracts\ItemRepositoryInterface;
use App\Repositories\Contracts\ListaRepositoryInterface;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ShowListWithItensController extends Controller
{
    protected $itemRepository;
    protected $listaRepository;

    public function __construct(
        ItemRepositoryInterface $itemRepository,
        ListaRepositoryInterface $listaRepository)
    {
        $this->itemRepository = $itemRepository;
        $this->listaRepository = $listaRepository;
    }

    public function __invoke(Request $request){
        $rota = $request->server('REQUEST_URI');

        $lista_id = preg_replace("/\D/","", $rota);
        $newId = intval($lista_id);
        $itens = $this->itemRepository->findItensByListId($newId);
        return view('listas.show-list-itens', ['itens' => $itens]);
    }
}
