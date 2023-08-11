<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProdutoController;



Route::get('/', function () {
    return view('welcome');
});


Route::get('/produto', [ProdutoController::class, 'index']);
Route::get('/produto/create', [ProdutoController::class, 'create']);
Route::get('/produto/{id}', [ProdutoController::class, 'show']);
Route::get('/produto/{id}/edit', [ProdutoController::class, 'edit']);
Route::get('/produto/{id}/destroy', [ProdutoController::class, 'destroy']);

