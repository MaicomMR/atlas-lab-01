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

Route::get('/login', [\App\Http\Controllers\Auth\LoginController::class, 'index'])->name('login');
Route::post('/login', [\App\Http\Controllers\Auth\LoginController::class, 'login'])->name('login');

Route::get('/register', function () {
    return view('auth/register');
})->name('register');

Route::prefix('web')->middleware(['logAcesso'])->group(function () {
    Route::get('/comprar', [\App\Http\Controllers\ListagemController::class, 'index'])->name('comprar');
    Route::post('/comprar', [\App\Http\Controllers\ListagemController::class, 'comprar'])->name('comprar');
    Route::get('/lista/total', [\App\Http\Controllers\ListagemController::class, 'mostrarLista'])->name('lista-compras');
    Route::put('lista/edit', [\App\Http\Controllers\ListagemController::class, 'update'])->name('editar-compras');
    Route::delete('/lista/delete', [\App\Http\Controllers\ListagemController::class, 'deletar'])->name('rm-compras');
    Route::post('/lista/add', [\App\Http\Controllers\ListagemController::class, 'comprar'])->name('add-compras');
});

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
