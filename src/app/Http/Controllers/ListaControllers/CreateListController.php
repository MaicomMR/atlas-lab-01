<?php

namespace App\Http\Controllers\ListaControllers;

use App\Http\Controllers\Controller;
use App\Models\Lista;
use App\Repositories\Contracts\ListaRepositoryInterface;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CreateListController extends Controller {

    private $listaRepository;

    public function __construct(ListaRepositoryInterface $listaRepository)
    {
       $this->listaRepository = $listaRepository;
    }

    public function __invoke(Request $request)
    {
        $lista = new Lista;

        $request->validate([
            'nome' => 'required|max:100|min:1|string',
            'descricao' => 'required|max:100|min:1',
        ],
        [
            'nome.required' => "O campo Nome é obrigatorio!",
        ]);

    try {

        $lista->nome = $request->nome;
        $lista->descricao = $request->descricao;
        $lista->user_id = Auth::id();
        $lista->save();

    } catch (\Illuminate\Database\QueryException $ex) {
        $error = $ex->getMessage();
        return redirect()->route('add-lista-page', ['error' => $error]);
    }
        $listas = Lista::where('user_id', Auth::id())->get();
        return view('listas.show-all-list',['listas'=> $listas]);
    }
}
