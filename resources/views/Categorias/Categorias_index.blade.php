@extends('adminlte::page')

@section('content')
<div class="container">
   
Categorias<br>

@if (session('status'))
    <div class="alert alert-success">
        {{ session('status') }}
    </div>
@endif

<script>
    function ConfirmDelete() {
      return confirm('Tem certeza que deseja excluir este registro?');
    }
</script>

<a class="btn btn-info" href= "{{ url('/categorias/create') }}">CRIAR</a><br>

<table class="table table-striped">
  <tr>
    <th>id</th>
    <th>Nome</th>
    <th>Ações</th>
  </tr>

@foreach ($categorias as $categorias)
  <tr>
    <td>{{ $categorias->id }}</td>
    <td>{{ $categorias->nome }}</td>
    <td>
      <a class="btn btn-success" href="{{ url('/categorias/' . $categorias->id) }}">VISUALIZAR</a>
      <a class="btn btn-warning" href="{{ url('/categorias/' . $categorias->id . '/edit') }}">EDITAR</a>

      <form method="POST" action="{{ url('/categorias/' . $categorias->id) }}" onsubmit = "return ConfirmDelete()" >
    @method('DELETE')
    @csrf
    <input class="btn btn-danger" type="submit" value="Excluir">
 
    ...
</form>


    </td>
  </tr>

  @endforeach

</table>
</div>
@endsection
