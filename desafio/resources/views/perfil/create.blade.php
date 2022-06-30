@extends('layouts.main')
@section('title', 'Cadastrar Perfil de Usuário')
@section('content')
<div id="event-create-container" class="col-md-6 offset-md-3">
    <h1>Cadastro de Perfil de Usuários</h1>
    <form action="https://www.sofs.com.br/desafio/public/perfil" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="form-group">
            <label for="titulo">Título: </label>
            <input type="text" class="form-control" id="titulo" name="titulo" placeholder="Titulo do Perifl">
        </div>
        <div class="form-group">
            <label for="descricao">Descrição: </label>
            <input type="text" class="form-control" id="descricao" name="descricao" placeholder="Descrição">
        </div>
        <input type="submit" value="Cadastrar" class="btn btn-primary">
    </form>
</div>
@endsection