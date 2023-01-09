<?php

namespace App\Http\Controllers\ListaControllers;

use App\Http\Controllers\Controller;
use App\Models\Lista;
use App\Repositories\Contracts\ListaRepositoryInterface;
use App\Services\Contracts\ListServiceInterface;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use PhpParser\Node\Stmt\TryCatch;

class EditListNameController extends Controller
{

    protected $listaRepository;
    protected $listaService;

    public function __construct(
        ListaRepositoryInterface $listaRepository,
        ListServiceInterface $listaService
        )
    {
       $this->listaRepository = $listaRepository;
       $this->listaService = $listaService;
    }

    public function redirectToEditListBlade(ListaRepositoryInterface $listaRepository, Request $request)
    {
        
        $id = $request->route('id');
        $listaCompra = $listaRepository->findById($id);
        
        return view('listas.edit-list', ['listaCompra'=> $listaCompra, 'id' => $id]);
    }

    public function editListData(Request $request)
    {
        $id = $request->route('id');

        $newData = $request->all();

        $this->listaService->saveNewData($id, $newData);
        
        $user_id = Auth::id();
        $listas = $this->listaRepository->ShowAllListByAuthId($user_id);
        return view('listas.show-all-list',['listas'=> $listas]);
    }
}
