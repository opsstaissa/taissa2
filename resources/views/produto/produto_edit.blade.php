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
