<?php

namespace App\Http\Controllers\ListaControllers;

use App\Http\Controllers\Controller;
use App\Repositories\ListaRepository;
use Illuminate\Http\Request;

class ShowAllListsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
  public function __invoke(ListaRepository $model)
  {
      $listas = $model->all();
    return view('listas.show-all-list',['listas'=> $listas]);
  }

}
