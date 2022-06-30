@extends('layouts.main')
@section('title', 'Mostrar Perfil de Usuários')
@section('content')
<div id="search-container" class="col-md-12">
<h1>Buscar Perfil</h1>
<form action="https://www.sofs.com.br/desafio/public/perfil/show" method="GET">
    <input type="text" id="search" name="search" class="form-control" placeholder="Digite a busca e tecle ENTER...">
</form>
</div>
<div id="event-create-container" class="col-md-6 offset-md-3">
    @if($search)
    <h1>Buscando por {{ $search }}</h1>
    @else
    <h1>Lista de Perfil Usuários</h1>
    @endif
    @if($id_perfil_usu_logado == 1)
    <a href="https://www.sofs.com.br/desafio/public/perfil/create" class="btn btn-warning"> + Cadastrar</a>
    @endif
    <div id="card-container" class="row">
        @foreach($perfil as $perfil)
            <div class="card col-md-3">
                <div class="card-body">
                    <h5 class="card-titulo">
                        Título: {{  $perfil->titulo  }}
                    </h5>
                    <p>
                        Descrição: {{  $perfil->descricao  }}
                    </p>
                    @if($id_perfil_usu_logado == 1)
                    <div class="row col-md-12">
                        <div class="col-md-12">
                            <a href="https://www.sofs.com.br/desafio/public/perfil/edit/{{ $perfil->id }}" class="btn btn-default edit-btn"><ion-icon name="create-outline"></ion-icon>Editar</a>
                        </div>
                        <div class="col-md-12">
                            <form action="https://www.sofs.com.br/desafio/public/perfil/{{ $perfil->id }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-primary delete-btn"><ion-icon name="trash-outline"></ion-icon>Deletar</button>
                            </form>
                        </div>
                    </div>
                    @endif
                </div>
            </div>
        @endforeach    
    </div>   
</div>
@endsection