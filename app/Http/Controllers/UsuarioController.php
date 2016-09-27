<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\User;
use Session;

class UsuarioController extends Controller
{
    public function index(){

        $usuarios=User::all();
        return view('user.index',compact("usuarios"));

    }

    public function create(){
        return view('user.create');
    }

    public function store(Request $request){
        $usuario = $request->all();
        $usuario['password']=bcrypt($usuario['password']);
        $user=User::create($usuario);

        Session::flash('message', 'Usuario creado con exito !');
        return redirect()->route('user.index');
    }

    public function show(Request $request,$id){
        $usuario=User::findOrFail($id);

        return view('user.show',compact("usuario"));
    }


    public function edit($id){
        $usuario = User::findOrFail($id);
        return view('user.edit',compact('usuario'));
    }

    public function update(Request $request, $id){
        $input=$request->all();
        $usuario=User::findOrFail($id);
        $usuario->fill($input)->save();

        Session::flash('message', 'Usuario editado con exito !');
        return redirect()->route('user.show',$id);

    }
}
