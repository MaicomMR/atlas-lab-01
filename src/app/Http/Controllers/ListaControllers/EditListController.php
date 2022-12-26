<?php

namespace App\Http\Controllers\ListaControllers;

use App\Http\Controllers\Controller;
use App\Repositories\Contracts\ListaRepositoryInterface;
use Illuminate\Http\Request;

class EditListController extends Controller
{
    protected $listaRepository;


    public function __construct(ListaRepositoryInterface $listaRepository)
    {
        $this->listaRepository = $listaRepository;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
  public function __invoke(Request $request)
  {
      $id = $request->route('id');

      $listaCompra = $this->listaRepository->findById($id);
      
      return view('formulario', ['listaCompra'=> $listaCompra]);
  }

}
