<?php

namespace App\Http\Controllers;

use App\Models\Recrutamento;
use Illuminate\Http\Request;

class RecrutamentoController extends Controller
{
    
    public function index (){
        $recrutamento = Recrutamento::all();
        return view('page.usuario', compact('recrutamento'));
    }

      public function store(Request $request){
        $users=null;
        if(isset($request->id)){
            $recrutamento=Recrutamento::find($request->id);
            
        }else {
            $recrutamento=new Recrutamento();       
        }

        $recrutamento->nome =$request->nome;
        $recrutamento->email =$request->email;
        $recrutamento->tipo =$request->tipo;
        $recrutamento->password =bcrypt("Recrutamento");
        $recrutamento->save();
        return redirect()->back();
    }
    public function apagar($id) {
        $recrutamento = Recrutamento:: find($id)->delete();
        return redirect()->back();
    }

}
