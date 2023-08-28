<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Categorias;

class CategoriasController extends Controller
{
    /**
     * Display a listing of the resource.
     */

    public function index()
    {
        $categorias = Categorias::get();
        return view (('categorias.categorias_index'), ['categorias' => $categorias]);
    }

    /**
     * Show the form for creating a new resource.
     */

    public function create()
    {
        return view ('categorias.categorias_create');
    }

    /**
     * Store a newly created resource in storage.
     */

    public function store(Request $request)
    {
        //dd($request->all());

        $messages = [
            'nome.required' => 'o :attribute é obrigatório!',
        ];

        $validated = $request->validate([
            'nome'          => 'required|min:5',
        ],  $messages);

        $categorias = new Categorias();
        $categorias->nome         = $request->nome ;
        $categorias->save();

        return redirect()->route('categorias.index')->with('status', 'Categorias criado com sucesso!!');
    }

    /**
     * Display the specified resource.
     */

    public function show(string $id)
    {
        $categorias = Categorias::find($id);
        //dd($categorias);
        return view('categorias.categorias_show', ['categorias' => $categorias]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $categorias = Categorias::find($id);
        return view('categorias.categorias_edit', ['categorias' => $categorias]);

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $messages = [
            'nome.required' => 'o :attribute é obrigatório!',
        ];

        $validated = $request->validate([
            'nome'          => 'required|min:5',
        ],  $messages);

        $categorias = Categorias::find($id);
        $categorias->nome                  = $request->nome;
        $categorias->save();

        return redirect()->route('categorias.index')->with('status', 'Categorias alterado com sucesso');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $categorias = Categorias::find($id);
        $categorias->delete();

        return redirect()->route('categorias.index')->with('status', 'Categorias excluido com sucesso');
    }
}
