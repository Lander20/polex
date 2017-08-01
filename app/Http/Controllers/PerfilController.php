<?php

namespace App\Http\Controllers;

use App\Seccion;
use Illuminate\Http\Request;
use App\Http\Requests\PerfilRequest;
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

    public function store(PerfilRequest $request){
        $perfil = $request->all();
        $perfil=Perfil::create($perfil);

        Session::flash('flash_message', 'Perfil creado con exito !');
        return redirect()->route('perfil.index');
    }

    public function show(Request $request,$id){
        $perfil=Perfil::findOrFail($id);
        //var_dump($perfil->usuarios);
        return view('perfil.show',compact("perfil"));
    }


    public function edit($id){
        $perfil = Perfil::findOrFail($id);

        return view('perfil.edit',compact('perfil'));
    }

    public function update(PerfilRequest $request, $id){
        $input=$request->all();
        $perfil=Perfil::findOrFail($id);
        $perfil->fill($input)/*->save()*/;
        $perfil->save();

        Session::flash('flash_message', 'Perfil editado con exito !');
        return redirect()->route('perfil.show',$id);

    }

    public function users($idPerfil){
        $perfil=Perfil::find($idPerfil);
        return $perfil->usuarios()->get();
        return $perfil;
    }
}
