<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProdutoController;
use App\Http\Controllers\CategoriasController;



Route::get('/', function () {
    return view('welcome');
});

//------------------------------------- produto ----------------------------------

Route::get('/produto', [ProdutoController::class, 'index'])->name('produto.index');


Route::get('/produto/create', [ProdutoController::class, 'create']);
Route::post('/produto/create', [ProdutoController::class, 'store']);


Route::get('/produto/{id}', [ProdutoController::class, 'show']);


Route::get('/produto/{id}/edit', [ProdutoController::class, 'edit']);
Route::put('/produto/{id}', [ProdutoController::class, 'update']);

Route::delete('/produto/{id}', [ProdutoController::class, 'destroy']);

//------------------------------------- produto ----------------------------------

//------------------------------------- categorias ----------------------------------

Route::get('/categorias', [CategoriasController::class, 'index'])->name('categorias.index');


Route::get('/categorias/create', [CategoriasController::class, 'create']);
Route::post('/categorias/create', [CategoriasController::class, 'store']);


Route::get('/categorias/{id}', [CategoriasController::class, 'show']);


Route::get('/categorias/{id}/edit', [CategoriasController::class, 'edit']);
Route::put('/categorias/{id}', [CategoriasController::class, 'update']);

Route::delete('/categorias/{id}', [CategoriasController::class, 'destroy']);

//------------------------------------- categorias ----------------------------------


Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
