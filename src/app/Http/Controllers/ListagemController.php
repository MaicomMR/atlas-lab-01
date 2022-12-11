<?php

namespace App\Http\Controllers;

use App\Models\Compra;
use App\Repositories\CompraRepository;
use Illuminate\Http\Request;

class ListagemController extends Controller
{
    public function index (){
        return view('formulario');
    }

    public function comprar(Request $request)
    {
        $compra = new Compra;

        $request->validate([
            'compra1' => 'required|max:100|min:1|string',
            'valor' => 'required|max:100|min:1|integer',
            'quantidade' => 'required|max:100|min:1|integer'
        ],
        [
            'compra1.required' => "O campo Produto é obrigatorio!",
            'valor.required' => "O campo Valor é obrigatorio!",
            'quantidade.required' => "O campo Quantidade é obrigatorio!",
            'quantidade.integer' => "O campo Quantidade deve receber um numero!",
            'valor.integer' => "O campo valor deve receber um numero!"
        ]);

             $compra->produto = $request->input('compra1');
             $compra->valor = $request->input('valor');
             $compra->quantidade = $request->input('quantidade');
             $compra->save();
         return view('itens');
    }

    public function mostrarLista(CompraRepository $model)
    {
        $compras = $model->all();
        return view('itens', ['compras'=> $compras]);
    }

    public function deletar(Request $request, CompraRepository $model)
    {
        $id = $request->input('delete');
        $delete = $model->findById($id);
        if(!$delete) {
            return "Produto não encontrado";
        } else {
            $model->deleteById($id);
            return redirect()->route('mostrarLista');
        }
    }

    public function update(Request $request)
    {

    }
}
