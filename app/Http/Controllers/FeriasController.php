<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Ferias;

class FeriasController extends Controller
{
    public function index (){
        $ferias= Ferias::all();
        return view('page.ferias', compact('ferias'));
       
    }

    public function store(Request $request){
        $ferias=null;
        if(isset($request->id)){
            $ferias=User::find($request->id);
                        
        }else {
            $ferias = new Ferias();
        }
           

        $ferias->data_inicio =$request->data_inicio;
        $ferias->data_fim =$request->data_inicio;
        $ferias->aprovado_por = Auth::user()->id;
        $ferias->estado= "Pendente";
        $ferias->funcionario_id=$request->funcionario_id;
        $ferias->save();
        return redirect()->back()->with('Sucesso','Adicionado com sucesso');
    }
    public function apagar($id) {
        Ferias:: find($id)->delete();
        return redirect()->back();

    }
}


