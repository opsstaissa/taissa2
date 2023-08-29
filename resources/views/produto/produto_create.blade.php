@extends('adminlte::page')

@section('content')
<div class="container">
    
Formulário de criação: <br>

@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<form method="POST" action="{{ url('/produto/create') }}">
    
        @csrf

    <label class="form-label" for="cars">Escolha uma categoria:</label>

<select class="form-control" name="categoria_id" id="categoria_id">
    @foreach ($categorias as $categorias)
        <option value="{{ $categorias->id }}">{{ $categorias->nome }}</option>
    @endforeach
</select>
 
  <label class="form-label" for="nome">Nome:</label><br>
  <input class="form-control" type="text" name="nome"><br>

  <label class="form-label" for="quantidade">Quantidade:</label><br>
  <input class="form-control" type="text" name="quantidade"><br>

  <label class="form-label" for="preco">Preço:</label><br>
  <input class="form-control" type="text" name="preco"><br>

  <input type="submit" value="Enviar">
 
</form>


</div>
@endsection
