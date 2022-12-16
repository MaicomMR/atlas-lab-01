<?php

namespace App\Http\Controllers;

use App\Http\Requests\AddItemToList;
use App\Models\Item;
use App\Repositories\Contracts\ItemRepositoryInterface;
use Illuminate\Http\Request;

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
        $item->valor = $validatedData['valor'];
        
        $item->save();

         return view('itens', ['itens' => $itens]);
    }

    public function mostrarLista()
    {
        $itens = $this->itemRepository->all();
        return view('itens', ['itens'=> $itens]);
    }

    public function deletar(Request $request)
    {
        $id = $request->input('delete');
        if(!$this->itemRepository->findById($id)) {
            return "Produto não encontrado";
        } else {
            // $model->deleteById($id);
            return redirect()->route('mostrarLista');
        }
    }

    public function update(Request $request)
    {

    }
}
