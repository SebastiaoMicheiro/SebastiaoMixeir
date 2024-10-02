<?php

namespace App\Http\Controllers;

use App\Models\Funcionario;
use App\Models\User;
use Illuminate\Http\Request;

class FuncionarioController extends Controller
{
    public function index (){
        $funcionario= Funcionario::all();
        return view('page.funcionario', compact('funcionario'));
       
    }

    public function store(Request $request){
        $funcionario=null;
        if(isset($request->id)){
            $funcionario=User::find($request->id);
            $user = User::find( $funcionario->users_id);
            $user->name = $request->nomeCompleto;
            $user->email = $request->email;
            $user->save();
            
        }else {
            $user=new User();
            $user->name = $request->nomeCompleto;
            $user->email = $request->email;
            $user->tipo ="Funcionario" ; 
            $user->password = bcrypt("124funcionario") ; 
            $user->save();
            $funcionario = new Funcionario();
        }
        
        if(isset($request->imagem)){
            $imagem = $request->imagem;

            $extencao = $imagem->extension();

            $imagemNome = md5(string:$imagem->getClientoriginalName().strtotime(datetime:"now")).$extencao;
            $imagem->move(public_path(path: 'img/carregadas'),$imagemNome);
            $funcionario->imagem = $imagemNome;
        }

        $funcionario->nAgente =$request->nAgente;
        $funcionario->cargo =$request->cargo;
        $funcionario->categoria =$request->categoria;
        $funcionario->nomeCompleto=$request->nomeCompleto;
        $funcionario->save();
        return redirect()->back()->with('Sucesso','Adicionado com sucesso');
    }
    public function apagar($id) {
        Funcionario:: find($id)->delete();
        return redirect()->back();

    }
}
