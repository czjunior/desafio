@extends('layouts.main')
@section('title', 'Mostrar Usuários')
@section('content')
<div id="search-container" class="col-md-12">
<h1>Buscar Usuário</h1>
<form action="https://www.sofs.com.br/desafio/public/users/show" method="GET">
    <input type="text" id="search" name="search" class="form-control" placeholder="Digite a busca e tecle ENTER...">
</form>
</div>
<div id="event-create-container" class="col-md-6 offset-md-3">
    @if($search)
    <h1>Buscando: {{ $search }}</h1>
    @else
    <h1>Lista de Usuários</h1>
    @endif
    @if($id_perfil_usu_logado == 1)
    <a href="https://www.sofs.com.br/desafio/public/users/create" class="btn btn-warning"> + Cadastrar</a>
    @endif
    <div id="card-container" class="row">
        @for($g=0;$g<(count($arr_us));$g++)
        <div class="card col-md-12">
                <div class="card-body">
                    <h4 class="card-name">
                        Nome: {{  $arr_us[$g]['nome']  }}
                    </h4>
                    <p>
                        Perfil: {{  $arr_us[$g]['perfil']  }}
                    </p>
                    <p>
                        Email: {{  $arr_us[$g]['email']  }}
                    </p>
                    @if($id_perfil_usu_logado == 1)
                    <div class="row col-md-12">
                        <div class="col-md-12">
                            <a href="https://www.sofs.com.br/desafio/public/users/edit/{{ $arr_us[$g]['id'] }}" class="btn btn-default edit-btn"><ion-icon name="create-outline"></ion-icon>Editar</a>
                        </div>
                        <div class="col-md-12">
                            <form action="https://www.sofs.com.br/desafio/public/users/{{ $arr_us[$g]['id'] }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-primary delete-btn"><ion-icon name="trash-outline"></ion-icon>Deletar</button>
                            </form>
                        </div>    
                    </div>
                    <p></p>
                        @if($arr_us[$g]['perfil'] === "Sem perfil definido")
                        <h5>Adicionar Perfil</h5>
                        <div class="row col-md-12">
                                <form action="https://www.sofs.com.br/desafio/public/perfil/perfilUsers" method="POST" enctype="multipart/form-data">
                                    @csrf
                                    @method('POST')
                                    <input type="hidden" name="user_id" id="user_id" value="{{ $arr_us[$g]['id'] }}" >
                                    <select name="perfil_id" id="perfil_id" class="form-control col-md-5">                                
                                        @for($i = 0; $i<(count($perfil)); $i++)
                                            <option value="{{ $perfil[$i]['id'] }}"> {{ $perfil[$i]['titulo'] }}</option>
                                        @endfor
                                    </select>
                                    <button type="submit" class="btn btn-default check-btn col-md-3"><ion-icon name="checkmark-circle-outline"></ion-icon></button>
                                </form>
                        </div>
                        @else
                        <h5>Remover Perfil</h5>
                        <div class="row col-md-12">
                            <form action="https://www.sofs.com.br/desafio/public/perfil/perfilUsers/{{ $arr_us[$g]['id'] }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-primary delete-btn"><ion-icon name="trash-outline"></ion-icon></button>
                            </form>
                    </div>
                        @endif
                    @endif
                </div>
        </div>       
        @endfor
    </div>    
</div>
@endsection