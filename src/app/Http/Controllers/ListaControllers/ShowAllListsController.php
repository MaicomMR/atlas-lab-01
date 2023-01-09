<?php

namespace App\Http\Controllers\ListaControllers;

use App\Http\Controllers\Controller;
use App\Repositories\Contracts\ListaRepositoryInterface;
use Illuminate\Support\Facades\Auth;

class ShowAllListsController extends Controller
{
    protected $listaRepository;

    public function __construct(ListaRepositoryInterface $listaRepository)
    {
       $this->listaRepository = $listaRepository;
    }
    
     public function __invoke()
     {
        $user_id = Auth::id();
        $listas = $this->listaRepository->ShowAllListByAuthId($user_id);
        return view('listas.show-all-list',['listas'=> $listas]);
     }

}
