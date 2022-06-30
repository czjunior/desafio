@extends('layouts.main')
@section('title', 'Editar Perfil '. $perfil->titulo )
@section('content')
<div id="event-create-container" class="col-md-6 offset-md-3">
    <h1>Editar Perfil de Usuários</h1>
    <form action="https://www.sofs.com.br/desafio/public/perfil/update/{{ $perfil->id }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="title">Título: </label>
            <input type="text" class="form-control" id="titulo" name="titulo" value="{{ $perfil->titulo }}">
        </div>
        <div class="form-group">
            <label for="descricao">Descrição: </label>
            <input type="text" class="form-control" id="descricao" name="descricao" value="{{ $perfil->descricao }}">
        </div>
        <input type="submit" value="Editar" class="btn btn-primary">
    </form>
</div>
@endsection