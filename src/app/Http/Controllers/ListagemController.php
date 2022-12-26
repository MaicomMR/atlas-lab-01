<?php

namespace App\Http\Controllers;

use App\Http\Requests\AddItemToList;
use App\Models\Item;
use App\Models\Lista;
use App\Repositories\Contracts\ItemRepositoryInterface;
use App\Services\Contracts\ItemServiceInterface;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ListagemController extends Controller
{

    protected $itemRepository;
    protected $itemService;

    public function __construct(
        ItemRepositoryInterface $itemRepository,
        ItemServiceInterface $itemService)
    {
        $this->itemRepository = $itemRepository;
        $this->itemService = $itemService;
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
        
        $listas = Lista::where('user_id', Auth::id())->get();
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
        
        if(!$this->itemRepository->findById($id)) {
            return "Produto não encontrado";
        } else {
            $item = $this->itemRepository->findById($id);
            $item->delete();
            return redirect()->back();
        }
    }

    public function adicionarItens(Request $request)
    {
        $itemId = $request->route('id');
        $itensAdd = $request->input('quantidade');

        $this->itemService->adicionarMaisItens($itemId, $itensAdd);

        return redirect()->back();
    }
}
