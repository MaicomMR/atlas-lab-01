<?php

namespace App\Http\Controllers;

use App\Http\Requests\AddItemToList;
use App\Models\Item;
use App\Models\Lista;
use App\Repositories\Contracts\ItemRepositoryInterface;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ListagemController extends Controller
{

    protected $itemRepository;

    public function __construct(ItemRepositoryInterface $itemRepository)
    {
        $this->itemRepository = $itemRepository;
    }


    public function index (){
        return view('formulario');
    }

    public function comprar(AddItemToList $request)
    {
        $validatedData = $request->validated();
        $item = new Item;
        $itens = $this->itemRepository->all();

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
        $item = $this->itemRepository->findById($itemId);
        dd($item);
    }
}
