@extends('adminlte::page')

@section('content')
<div class="container">
    
Formulário de edição: <br>

@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<form method="POST" action="{{ url('/produto/' . $produto->id) }}">
    @method('PUT')
    @csrf

<select class="form-control" name="categoria_id" id="categoria_id">
    @foreach ($categorias as $categorias)

        @if ($categorias->id == $produto->categoria_id)
            <option value="{{ $categorias->id }}" selected>{{ $categorias->nome }}</option>
        @else
            <option value="{{ $categorias->id }}">{{ $categorias->nome }}</option>
        @endif
    @endforeach
</select>
 
  <label for="nome">Nome:</label><br>
  <input type="text" name="nome" value="{{ $produto->nome }}"><br>

  <label for="quantidade">Quantidade:</label><br>
  <input type="text" name="quantidade" value="{{ $produto->quantidade }}"><br>

  <label for="preco">Preço:</label><br>
  <input type="text" name="preco" value="{{ $produto->preco }}"><br>

  <input type="submit" value="Enviar">
 
</form>


</div>
@endsection
