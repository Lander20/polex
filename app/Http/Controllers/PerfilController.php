<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Perfil;
use Session;

class PerfilController extends Controller
{
    public function index(){
        $perfiles=Perfil::all();
        return view('perfil.index',compact("perfiles"));
    }

    public function create(){
        return view('perfil.create');
    }

    public function store(Request $request){
        $perfil = $request->all();
        $perfil=Perfil::create($perfil);

        Session::flash('flash_message', 'Perfil creado con exito !');
        return redirect()->route('perfil.index');
    }

    public function show(Request $request,$id){
        $perfil=Perfil::findOrFail($id);

        return view('perfil.index',compact("perfil"));
    }


    public function edit($id){
        $perfil = Perfil::findOrFail($id);

        return view('perfil.edit',compact('perfil'));
    }

    public function update(Request $request, $id){
        $input=$request->all();
        $perfil=Perfil::findOrFail($id);
        $perfil->fill($input)->save();

        Session::flash('flash_message', 'Perfil editado con exito !');
        return redirect()->route('perfil.show',$id);

    }

    public function destroy($id){
        $perfil = Perfil::findOrFail($id);
        $perfil->estado=0;
        $perfil->save();
        Session::flash('flash_flash_message', 'Perfil deshabilitado con exito !');
        return redirect()->route('perfil.index');
    }

    public function habilitar($id){
        $perfil = Perfil::findOrFail($id);
        $perfil->estado=1;
        $perfil->save();
        Session::flash('flash_flash_message', 'Perfil habilitado con exito !');
        return redirect()->route('perfil.index');
    }
}
