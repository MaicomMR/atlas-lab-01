<?php

use App\Http\Controllers\Auth\AuthenticatedSessionController;
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

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});


Route::middleware(['auth', 'logAcesso'])->group(function () {
    Route::get('/comprar', [\App\Http\Controllers\ListagemController::class, 'index'])->name('comprar');
    Route::post('/comprar', [\App\Http\Controllers\ListagemController::class, 'comprar'])->name('comprar');
    Route::get('/lista/total', [\App\Http\Controllers\ListagemController::class, 'mostrarLista'])->name('lista-compras');
    Route::put('lista/edit', [\App\Http\Controllers\ListagemController::class, 'update'])->name('editar-compras');
    Route::delete('/lista/delete', [\App\Http\Controllers\ListagemController::class, 'deletar'])->name('rm-compras');
    Route::post('/lista/add', [\App\Http\Controllers\ListagemController::class, 'comprar'])->name('add-compras');
});

require __DIR__.'/auth.php';
