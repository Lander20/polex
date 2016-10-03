<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\UserRequest;
use App\Http\Requests;
use App\User;
use App\Perfil;
use Session;

class UsuarioController extends Controller
{
    public function index(){

        $usuarios=User::all();
        return view('user.index',compact("usuarios"));

    }

    public function create(){
        $perfiles=Perfil::all();
        return view('user.create',compact('perfiles'));
    }

    public function store(UserRequest $request){
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
        $perfiles=Perfil::all();
        //var_dump($perfiles);
        //echo ($usuario->perfil->id);
        return view('user.edit',compact('usuario','perfiles'));
    }

    public function update(UserRequest $request, $id){
        $input=$request->all();
        $usuario=User::findOrFail($id);
        $usuario->fill($input)->save();

        Session::flash('flash_message', 'Usuario editado con exito !');
        return redirect()->route('user.index',$id);

    }

    public function destroy($id){
        $usuario = User::findOrFail($id);
        $usuario->estado=0;
        $usuario->save();
        Session::flash('flash_message', 'Usuario deshabilitado con exito !');
        return redirect()->route('user.index');
    }

    public function habilitar($id){
        $usuario = User::findOrFail($id);
        $usuario->estado=1;
        $usuario->save();
        Session::flash('flash_message', 'Usuario habilitado con exito !');
        return redirect()->route('user.index');
    }
}
