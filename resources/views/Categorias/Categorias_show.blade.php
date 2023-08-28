@extends('adminlte::page')

@section('content')
<div class="container">
   <h1>Categorias</h1><br>

   <strong>Nome: </strong>{{ $categorias->nome }}<br>
   <strong>Criação: </strong>{{ $categorias->created_at }}<br>

</div>
@endsection
