<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Produto;

class ProdutoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //dd('Produto');
        $produtos = Produto::get();
        dd($produtos);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $produtos = new Produto();
        $produtos->nome = 'sabão em pó';
        $produtos->quantidade = 70;
        $produtos->preco = 10.5;
        $produtos->save();
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $produtos = Produto::find($id);
        dd($produtos);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $produtos = Produto::find($id);
        $produtos->nome = 'agua sanitaria';
        $produtos->quantidade = 90;
        $produtos->preco = 3.5;
        $produtos->save();
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $produtos = Produto::find($id);
        $produtos->delete();
    }
}
