<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
class UserController extends Controller
{
    public function index (){
        $users = User::all();
        return view('page.usuario', compact('users'));
       
    }

    public function store(Request $request){
        $users=null;
        if(isset($request->id)){
            $users=user::find($request->id);
            
        }else {
            $users=new user();       
        }

        $users->name =$request->name;
        $users->email =$request->email;
        $users->tipo =$request->tipo;
        $users->password =bcrypt("1234funcionario");
        $users->save();
        return redirect()->back();
    }
    public function apagar($id) {
        $user = User:: find($id)->delete();
        return redirect()->back();

    }
}
