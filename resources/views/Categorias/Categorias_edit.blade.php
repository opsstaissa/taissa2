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

<form method="POST" action="{{ url('/categorias/' . $categorias->id) }}">
    @method('PUT')

    @csrf
 
  <label for="nome">Nome:</label><br>
  <input type="text" name="nome" value="{{ $categorias->nome }}"><br>

  <input type="submit" value="Enviar">
 
</form>


</div>
@endsection
