<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Produto;
use App\Models\Categorias;

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
        $categorias = Categorias::orderBy('nome', 'ASC')->get();
        return view ('produto.produto_create', ['categorias' => $categorias] );

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
            'categoria_id.required' => 'o :attribute é obrigatório!',
        ];

        $validated = $request->validate([
            'nome'          => 'required|min:5',
            'quantidade'    => 'required',
            'preco'         => 'required',
            'categoria_id' => 'required',
        ],  $messages);

        $produtos = new Produto();
        $produtos->nome         = $request->nome ;
        $produtos->quantidade   = $request->quantidade;
        $produtos->preco        = $request->preco;
        $produtos->categoria_id = $request->categoria_id;
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
        $categorias = Categorias::orderBy('nome', 'ASC')->get();
        return view('produto.produto_edit', ['produto' => $produtos, 'categorias' => $categorias]);

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
            'categoria_id.required' => 'o :attribute é obrigatório!',
        ];

        $validated = $request->validate([
            'nome'          => 'required|min:5',
            'quantidade'    => 'required',
            'preco'         => 'required',
            'categoria_id'  => 'required'
        ],  $messages);

        $produto = Produto::find($id);
        $produto->nome                  = $request->nome;
        $produto->quantidade            = $request->quantidade;
        $produto->preco                 = $request->preco;
        $produto->categoria_id          = $request->categoria_id;
        $produto->save();

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
