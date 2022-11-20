<?php

namespace App\Http\Controllers;

use App\Models\Compra;
use Illuminate\Http\Request;
use mysql_xdevapi\Exception;

class ListagemController extends Controller
{
    public function comprar(Request $request)
    {
        $compra = new Compra;
        try {
            $compra->produto = $request->input('compra1');
            $compra->valor = $request->input('valor');
            $compra->save();
            return view('index');
        }catch (Exception $e){
            return dd($e);
        }
    }

    public function mostrarLista()
    {
        $compras = Compra::get();
        return view('itens', ['compras'=> $compras]);
    }
}
