@extends('layouts.main')
@section('title', 'Cadastrar Usuário')
@section('content')
<div id="event-create-container" class="col-md-6 offset-md-3">
    <h1>Cadastro de Usuários</h1>
    <form action="https://www.sofs.com.br/desafio/public/users" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="form-group">
            <label for="nome_completo">Nome Completo: </label>
            <input type="text" class="form-control" id="nome_completo" name="nome_completo" placeholder="Nome do Usuário">
        </div>       
        <div class="form-group">
            <label for="email">Email: </label>
            <input type="text" class="form-control" id="email" name="email" placeholder="Email do Usuário">
        </div> 
        <div class="form-group">
            <label for="password">Senha: </label>
            <input type="password" class="form-control" id="password" name="password" placeholder="Senha do Usuário">
        </div>  
        <input type="submit" value="Cadastrar" class="btn btn-primary">
    </form>
</div>
@endsection