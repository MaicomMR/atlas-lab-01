<?php

namespace App\Http\Controllers;

use App\Models\Compra;
use Illuminate\Http\Request;
use mysql_xdevapi\Exception;
use Validator;

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

    public function mostrarLista()
    {
        $compras = Compra::get();
        return view('itens', ['compras'=> $compras]);
    }

    public function deletar(Request $request)
    {
        $id = $request->all();
        dd($id);
        $delete = Compra::find($id);
        if($delete === null) {
            return "Produto não encontrado";
        } else {
            Compra::find($id)->delete();
            return redirect()->route('home');
        }
    }

    public function update(Request $request)
    {

    }
}
