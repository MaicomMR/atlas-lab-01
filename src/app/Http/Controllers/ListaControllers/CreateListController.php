<?php

namespace App\Http\Controllers\ListaControllers;

use App\Http\Controllers\Controller;
use App\Http\Requests\CreateListRequest;
use App\Models\Lista;
use App\Repositories\Contracts\ListaRepositoryInterface;
use Illuminate\Support\Facades\Auth;

class CreateListController extends Controller {

    private $listaRepository;

    public function __construct(ListaRepositoryInterface $listaRepository)
    {
       $this->listaRepository = $listaRepository;
    }

    public function __invoke(CreateListRequest $request)
    {
        $lista = new Lista;

        $validatedData = $request->validated();

    try {

        $lista->nome = $validatedData['nome'];
        $lista->descricao = $validatedData['descricao'];
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
