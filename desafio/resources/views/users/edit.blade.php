@extends('layouts.main')
@section('title', 'Editar Usuário '. $users->titulo )
@section('content')
<div id="event-create-container" class="col-md-6 offset-md-3">
    <h1>Editar Usuários</h1>
    <form action="https://www.sofs.com.br/desafio/public/users/update/{{ $users->id }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="nome_completo">Nome Completo: </label>
            <input type="text" class="form-control" id="name" name="name" value="{{ $users->name }}">
        </div>
        <div class="form-group">
            <label for="email">Email: </label>
            <input type="text" class="form-control" id="email" name="email" value="{{ $users->email }}">
        </div>
        <input type="submit" value="Editar" class="btn btn-primary">
    </form>
</div>
@endsection