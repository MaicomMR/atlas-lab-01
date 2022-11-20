<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::middleware([])->group(function () {
    Route::get('/lista', [\App\Http\Controllers\ListagemController::class, 'index'])->name('lista-compras');
    Route::get('/lista/total', [\App\Http\Controllers\ListagemController::class, 'mostrarLista'])->name('lista-compras');
    Route::post('/lista/add', [\App\Http\Controllers\ListagemController::class, 'comprar'])->name('add-compras');

});

Auth::routes();


