<?php

namespace App\Http\Controllers\ListaControllers;

use App\Http\Controllers\Controller;

class CreateListPageController extends Controller
{
    public function index()
    {
        return view('listas.create-list');
    }
}
