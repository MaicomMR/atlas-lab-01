<?php

use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Controllers\ListaControllers\ShowAllListsController;
use App\Http\Controllers\ListaControllers\CreateListController;
use App\Http\Controllers\ListaControllers\DeleteListPageController;
use App\Http\Controllers\ListaControllers\EditListController;
use App\Http\Controllers\ProfileController;
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

Route::get('/login', [AuthenticatedSessionController::class, 'create'])->name('Login');



Route::middleware(['auth', 'verified'])->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::get('/listas', ShowAllListsController::class)->name('listas');
    Route::get('/listas/edit/{id}', EditListController::class)->name('listas.edit');
    Route::get('/lista/create', [\App\Http\Controllers\ListaControllers\CreateListPageController::class, 'index'])->name('add-lista-page');
    Route::post('/lista/create', CreateListController::class)->name('add-lista');
    Route::get('/listas/delete', DeleteListPageController::class)->name('delete.list');

});

//Rotas de alteração de itens em cada lista
Route::middleware(['auth', 'logAcesso'])->group(function () {
    Route::get('/comprar', [\App\Http\Controllers\ListagemController::class, 'index'])->name('comprar');
    Route::post('/comprar/{id}', [\App\Http\Controllers\ListagemController::class, 'comprar'])->name('comprar');
    Route::get('/lista/total', [\App\Http\Controllers\ListagemController::class, 'mostrarLista'])->name('lista-compras');
    Route::put('lista/edit', [\App\Http\Controllers\ListagemController::class, 'update'])->name('editar-compras');
    Route::delete('/lista/delete', [\App\Http\Controllers\ListagemController::class, 'deletar'])->name('rm-compras');
    Route::post('/lista/add', [\App\Http\Controllers\ListagemController::class, 'comprar'])->name('add-compras');
});

require __DIR__.'/auth.php';
