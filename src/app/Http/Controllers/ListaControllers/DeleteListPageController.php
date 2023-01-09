<?php

namespace App\Http\Controllers\ListaControllers;

use App\Http\Controllers\Controller;
use App\Models\Lista;
use App\Repositories\Contracts\ListaRepositoryInterface;
use App\Services\Contracts\ListServiceInterface;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DeleteListPageController extends Controller
{
    protected $listaService;
    protected $listaRepository;

    public function __construct(
        ListServiceInterface $listaService,
        ListaRepositoryInterface $listaRepository
        )
    {
       $this->listaService = $listaService;
       $this->listaRepository = $listaRepository;
    }

    public function __invoke(Request $request)
    {
        $id = $request->query('id');
        $newId = intval($id);

        $id = $this->listaRepository->findById($newId);
        $this->listaService->deleteList($newId);
        
        $user_id = Auth::id();
        $listas = $this->listaRepository->ShowAllListByAuthId($user_id);
        return view('listas.show-all-list',['listas'=> $listas]);
    }
}