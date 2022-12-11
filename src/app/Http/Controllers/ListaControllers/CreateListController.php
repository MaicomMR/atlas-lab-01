<?php

namespace App\Http\Controllers\ListaControllers;

use App\Http\Controllers\Controller;
use App\Models\Lista;
use Illuminate\Http\Request;


class CreateListController extends Controller {

    public function __invoke(Request $request)
    {
        $lista = new Lista;

        $lista->nome = $request->nome;
        $lista->descricao = $request->descricao;
        $lista->save();
        return view ('dashboard');
    }
}
