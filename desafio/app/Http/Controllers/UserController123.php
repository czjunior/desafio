<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Perfil;
use App\Models\PerfilUsers;

class UserController extends Controller
{
    public function index() {
        $user = User::all();
        $perfil = Perfil::all();
        $perfilUsers = PerfilUsers::all();

        // ID DO USUARIO LOGADO //
        if($data_us = auth()->user()){
        $id_usu = $data_us->id;
        }else{$id_usu = 0;}
        // ID DO USUARIO LOGADO //

        $id_perfil_usu_logado = 0;
        for($r=0;$r<count($user);$r++){
            $arr_us[$r]['nome'] = $user[$r]['name'];
            $arr_us[$r]['id'] = $user[$r]['id'];
            $arr_us[$r]['email'] = $user[$r]['email'];
            
        for($j=0;$j<(count($perfilUsers));$j++){
            if($perfilUsers[$j]['user_id'] == $user[$r]['id']){
                for($k=0;$k<(count($perfil));$k++){
                    if($perfil[$k]['id'] == $perfilUsers[$j]['perfil_id']){
                        $arr_us[$r]['perfil'] = $perfil[$k]['titulo'];
                    }
                }
            }
            // perfil do usuario logado //
            if($perfilUsers[$j]['user_id'] == $id_usu){             
                $id_perfil_usu_logado = $perfilUsers[$j]['perfil_id'];
                for($k=0;$k<(count($perfil));$k++){
                    if($perfil[$k]['id'] == $id_perfil_usu_logado){
                        $name_perfil_usu_logado = $perfil[$k]['titulo'];
                    }
                } 
            }                   
        }
        if(empty($arr_us[$r]['perfil'])){$arr_us[$r]['perfil'] = "Sem perfil definido";}
        }
        if($id_perfil_usu_logado == 0){$name_perfil_usu_logado = "Sem perfil definido";}

        return view('home', 
                    [
                        'user' => $user, 
                        'perfilUsers' => $perfilUsers, 
                        'perfil' => $perfil, 
                        'id_usu_logado' => $id_usu, 
                        'arr_us' => $arr_us,
                        'id_perfil_usu_logado' => $id_perfil_usu_logado,
                        'name_perfil_usu_logado' => $name_perfil_usu_logado
                    ]);
    }

    public function createUsers() {
        return view('users.create');
    }
/*
    public function showUser() {
        
        $search = request('search');
        if($search) {
            $user = User::where([
                ['name', 'like', '%'.$search.'%']
            ])->get();
        }
        else {
            $user = User::all();
        }        
        $perfil = Perfil::all();
        $perfilUsers = PerfilUsers::all();
        

        // ID DO USUARIO LOGADO //
        if($data_us = auth()->user()){
        $id_usu = $data_us->id;
        }else{$id_usu = 0;}
        // ID DO USUARIO LOGADO //

        
        return view('users.show', ['user' => $user, 'perfilUsers' => $perfilUsers, 'perfil' => $perfil, 'id_usu_logado' => $id_usu, 'search' => $search]);
    }
*/
    public function showUsers() {
        $search = request('search');
        if($search){
            $user = User::where([
                ['name', 'like', '%'.$search.'%']
            ])->get();
        }else{$user = User::all();}

        $perfil = Perfil::all();
        $perfilUsers = PerfilUsers::all();

        // ID DO USUARIO LOGADO //
        if($data_us = auth()->user()){
        $id_usu = $data_us->id;
        }else{$id_usu = 0;}
        // ID DO USUARIO LOGADO //

        $id_perfil_usu_logado = 0;
        for($r=0;$r<count($user);$r++){
            $arr_us[$r]['nome'] = $user[$r]['name'];
            $arr_us[$r]['id'] = $user[$r]['id'];
            $arr_us[$r]['email'] = $user[$r]['email'];
            
        for($j=0;$j<(count($perfilUsers));$j++){
            if($perfilUsers[$j]['user_id'] == $user[$r]['id']){
                for($k=0;$k<(count($perfil));$k++){
                    if($perfil[$k]['id'] == $perfilUsers[$j]['perfil_id']){
                        $arr_us[$r]['perfil'] = $perfil[$k]['titulo'];
                    }
                }
            }
            // perfil do usuario logado //
            if($perfilUsers[$j]['user_id'] == $id_usu){             
                $id_perfil_usu_logado = $perfilUsers[$j]['perfil_id'];
                for($k=0;$k<(count($perfil));$k++){
                    if($perfil[$k]['id'] == $id_perfil_usu_logado){
                        $name_perfil_usu_logado = $perfil[$k]['titulo'];
                    }
                } 
            }                   
        }
        if(empty($arr_us[$r]['perfil'])){$arr_us[$r]['perfil'] = "Sem perfil definido";}
        }
        if($id_perfil_usu_logado == 0){$name_perfil_usu_logado = "Sem perfil definido";}

        return view('users.show', 
                    [
                        'user' => $user, 
                        'perfilUsers' => $perfilUsers, 
                        'perfil' => $perfil, 
                        'id_usu_logado' => $id_usu, 
                        'arr_us' => $arr_us,
                        'id_perfil_usu_logado' => $id_perfil_usu_logado,
                        'name_perfil_usu_logado' => $name_perfil_usu_logado,
                        'search' => $search
                    ]);
    }


    public function storeUsers(Request $request){
        $user = new User;

        $user->name = $request->nome_completo;
        $user->email = $request->email;
        $user->password = md5($request->password);

        // ID DO USUARIO LOGADO //
        if($data_us = auth()->user()){
            $id_usu = $data_us->id;
            }else{$id_usu = 0;}
            // ID DO USUARIO LOGADO //

        $user->save();

        return redirect('users/show')->with('msg', 'Usuário Cadastrado com Sucesso!');

    }

    public function destroyUsers($id) {
        User::findOrFail($id)->delete();
        return redirect('/users/show')->with('msg', 'Usuário Deletado com Sucesso!');
    }

    public function storePerfilUsers(Request $request){
        $perfilUser = new PerfilUsers;

        $perfilUser->perfil_id = $request->perfil_id;
        $perfilUser->user_id = $request->user_id;
        
        $perfilUser->save();
        
        return redirect('/users/show')->with('msg', 'Perfil Atribuído ao Usuário com Sucesso!');
    }

    public function destroyPerfilUsers($user_id) {
        PerfilUsers::where('user_id', $user_id)->delete();
        return redirect('/users/show')->with('msg', 'Perfil de Usuário Removido com Sucesso!');
    }

    public function createPerfil() {
        return view('perfil.create');
    }

    public function showPerfil() {
        $search = request('search');
        if($search){
            $perfil = Perfil::where([
                ['titulo', 'like', '%'.$search.'%']
            ])->get();
        }else{ $perfil = Perfil::all();}

        $user = User::all();
        $perfilUsers = PerfilUsers::all();


        ///////////////////
        // ID DO USUARIO LOGADO //
        if($data_us = auth()->user()){
            $id_usu = $data_us->id;
            }else{$id_usu = 0;}
            // ID DO USUARIO LOGADO //
    
            $id_perfil_usu_logado = 0;
            for($r=0;$r<count($user);$r++){
                $arr_us[$r]['nome'] = $user[$r]['name'];
                $arr_us[$r]['id'] = $user[$r]['id'];
                $arr_us[$r]['email'] = $user[$r]['email'];
                
            for($j=0;$j<(count($perfilUsers));$j++){
                if($perfilUsers[$j]['user_id'] == $user[$r]['id']){
                    for($k=0;$k<(count($perfil));$k++){
                        if($perfil[$k]['id'] == $perfilUsers[$j]['perfil_id']){
                            $arr_us[$r]['perfil'] = $perfil[$k]['titulo'];
                        }
                    }
                }
                // perfil do usuario logado //
                if($perfilUsers[$j]['user_id'] == $id_usu){             
                    $id_perfil_usu_logado = $perfilUsers[$j]['perfil_id'];
                    for($k=0;$k<(count($perfil));$k++){
                        if($perfil[$k]['id'] == $id_perfil_usu_logado){
                            $name_perfil_usu_logado = $perfil[$k]['titulo'];
                        }
                    } 
                }                   
            }
            if(empty($arr_us[$r]['perfil'])){$arr_us[$r]['perfil'] = "Sem perfil definido";}
            }
            if($id_perfil_usu_logado == 0){$name_perfil_usu_logado = "Sem perfil definido";}
        ///////////////////////



        return view('perfil.show', 
                    [
                        'perfil' => $perfil, 
                        'search' => $search, 
                        'id_perfil_usu_logado' => $id_perfil_usu_logado
                    ]);
    }

    public function storePerfil(Request $request){
        $perfil = new Perfil;

        $perfil->titulo = $request->titulo;
        $perfil->descricao = $request->descricao;
        $perfil->status = 1;

        // ID DO USUARIO LOGADO //
        if($data_us = auth()->user()){
            $id_usu = $data_us->id;
            }else{$id_usu = 0;}
            // ID DO USUARIO LOGADO //

        $perfil->save();
        
        return redirect('perfil/show')->with('msg', 'Perfil de Usuário Cadastrado com Sucesso!');

    }

    public function destroyPerfil($id) {
        Perfil::findOrFail($id)->delete();
        return redirect('/perfil/show')->with('msg', 'Perfil Deletado com Sucesso!');
    }

    public function editPerfil($id) {
        $perfil = Perfil::findOrFail($id);
        return view('perfil.edit', ['perfil' => $perfil]);
    }

    public function updatePerfil(Request $request) {
        Perfil::findOrFail($request->id)->update($request->all());
        return redirect('/perfil/show')->with('msg', 'Perfil Editado com Sucesso!');
    }

}
