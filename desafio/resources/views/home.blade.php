@extends('layouts.main')
@section('title', 'Home Desafio')
@section('content')
<div id="search-container" class="col-md-12">
<h1>Qual serviço você precisa?</h1>
<form action="">
    <input type="text" id="search" name="search" class="form-control" placeholder="Procurar...">
</form>
</div>
<div id="container" class="conainer-fluid">
    <h1>Usuários</h1>
    <p class="subtitle">veja todos os usuários</p>
    <div id="card-container" class="row">
    @for($g=0;$g<(count($arr_us));$g++)
            <div class="card col-md-3">
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
                </div>
            </div>
        @endfor   
    </div>
    <h1>Perfis</h1>
    <p class="subtitle">veja todos os perfis de usuários</p>
    <div id="card-container" class="row">
        @foreach($perfil as $perfil)
            <div class="card col-md-3">
                <div class="card-body">
                    <h4 class="card-titulo">
                        Título: {{  $perfil->titulo  }}
                    </h4>
                    <p>
                        Descrição: {{  $perfil->descricao  }}
                    </p>
                </div>
            </div>
        @endforeach    
    </div>
</div>
@endsection