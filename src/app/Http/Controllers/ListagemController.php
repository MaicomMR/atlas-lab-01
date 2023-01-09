<?php

namespace App\Http\Controllers;

use App\Http\Requests\AddItemToList;
use App\Models\Item;
use App\Models\Lista;
use App\Repositories\Contracts\ItemRepositoryInterface;
use App\Repositories\Contracts\ListaRepositoryInterface;
use App\Services\Contracts\ItemServiceInterface;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ListagemController extends Controller
{

    protected $itemRepository;
    protected $listaRepository;
    protected $itemService;

    public function __construct(
        ItemRepositoryInterface $itemRepository,
        ItemServiceInterface $itemService,
        ListaRepositoryInterface $listaRepository
        )
    {
        $this->itemRepository = $itemRepository;
        $this->itemService = $itemService;
        $this->listaRepository = $listaRepository;
    }


    public function index (){
        return view('formulario');
    }

    public function comprar(AddItemToList $request)
    {
        $validatedData = $request->validated();

        $item = new Item;
        $item->lista_id = $validatedData['lista_id'];
        $item->item = $validatedData['item'];
        $item->quantidade = $validatedData['quantidade'];
        $item->save();
        
        $user_id = Auth::id();
        $listas = $this->listaRepository->ShowAllListByAuthId($user_id);
        return view('listas.show-all-list',['listas'=> $listas]);
    }

    public function mostrarLista()
    {
        $itens = $this->itemRepository->all();
        return view('itens', ['itens'=> $itens]);
    }

    public function deletar(Request $request)
    {
       $id = $request->route('id');
        
        $item = $this->itemRepository->findById($id);
        $item->delete();
        return redirect()->back();
    }

    public function adicionarItens(Request $request)
    {
        $itemId = $request->route('id');
        $itensAdd = $request->input('quantidade');

        $this->itemService->adicionarMaisItens($itemId, $itensAdd);

        return redirect()->back();
    }
}
