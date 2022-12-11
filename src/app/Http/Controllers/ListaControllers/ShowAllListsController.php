<?php

namespace App\Http\Controllers\ListaControllers;

use App\Http\Controllers\Controller;
use App\Repositories\Contracts\CompraRepositoryInterface;
use App\Repositories\Contracts\ListaRepositoryInterface;

class ShowAllListsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
  public function __invoke(ListaRepositoryInterface $model)
  {
      $listas = $model->all();
      return view('listas.show-all-list',['listas'=> $listas]);
  }

}
