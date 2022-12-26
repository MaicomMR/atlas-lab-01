<?php

namespace App\Http\Controllers\ListaControllers;

use App\Http\Controllers\Controller;
use App\Models\Lista;
use App\Repositories\Contracts\ListaRepositoryInterface;
use Illuminate\Support\Facades\Auth;

class ShowAllListsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
  public function __invoke()
  {
      $listas = Lista::where('user_id', Auth::id())->get();
      return view('listas.show-all-list',['listas'=> $listas]);
  }

}
