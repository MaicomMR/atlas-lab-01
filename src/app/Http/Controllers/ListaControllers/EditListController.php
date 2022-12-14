<?php

namespace App\Http\Controllers\ListaControllers;

use App\Http\Controllers\Controller;
use App\Repositories\Contracts\ListaRepositoryInterface;
use Illuminate\Http\Request;

class EditListController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
  public function __invoke(ListaRepositoryInterface $model, Request $request)
  {
      $id = $request->route('id');

      $listas = $model->findById($id);
      return view('formulario',['listas'=> $listas]);
  }

}
