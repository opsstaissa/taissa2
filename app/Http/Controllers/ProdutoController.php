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
        $produtos = Produto::get();
        return view (('produto.produto_index'), ['produtos' => $produtos]);
    }

    /**
     * Show the form for creating a new resource.
     */

    public function create()
    {

        return view ('produto.produto_create');

        //$produtos = new Produto();
        //$produtos->nome = 'sabão em pó';
        //$produtos->quantidade = 70;
        //$produtos->preco = 10.5;
        //$produtos->save();
    }

    /**
     * Store a newly created resource in storage.
     */

    public function store(Request $request)
    {
        //dd($request->all());

        $messages = [
            'nome.required' => 'o :attribute é obrigatório!',
            'quantidade.required' => 'a :attribute é obrigatório!',
            'preco.required' => 'o :attribute é obrigatório!',
        ];

        $validated = $request->validate([
            'nome'          => 'required|min:5',
            'quantidade'    => 'required',
            'preco'         => 'required'
        ],  $messages);

        $produtos = new Produto();
        $produtos->nome         = $request->nome ;
        $produtos->quantidade   = $request->quantidade;
        $produtos->preco        = $request->preco;
        $produtos->save();

        return redirect()->route('produto.index')->with('status', 'Produto criado com sucesso!!');
    }

    /**
     * Display the specified resource.
     */

    public function show(string $id)
    {
        $produto = Produto::find($id);
        //dd($produtos);
        return view('produto.produto_show', ['produto' => $produto]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $produtos = Produto::find($id);
        return view('produto.produto_edit', ['produto' => $produtos]);

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $messages = [
            'nome.required' => 'o :attribute é obrigatório!',
            'quantidade.required' => 'a :attribute é obrigatório!',
            'preco.required' => 'o :attribute é obrigatório!',
        ];

        $validated = $request->validate([
            'nome'          => 'required|min:5',
            'quantidade'    => 'required',
            'preco'         => 'required'
        ],  $messages);

        $produto = Produto::find($id);
        $produto->nome                  = $request->nome;
        $produto->quantidade            = $request->quantidade;
        $produto->preco                 = $request->preco;
        $produto-save();

        return redirect()->route('produto.index')->with('status', 'Produto alterado com sucesso');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $produtos = Produto::find($id);
        $produtos->delete();

        return redirect()->route('produto.index')->with('status', 'Produto excluido com sucesso');
    }
}
