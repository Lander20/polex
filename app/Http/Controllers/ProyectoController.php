<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\User;
use Illuminate\Http\Request;
use App\Http\Requests\ProyectoRequest;
use App\Http\Requests;
use App\Proyecto;
use App\Plano;
use Illuminate\Support\Facades\Auth;
use Session;

class ProyectoController extends Controller
{
    public function index(){
        $proyectos=Proyecto::all();
        return view('proyecto.index',compact("proyectos"));
    }

    public function create(){
        $usuarios = User::all();
        return view('proyecto.create',compact('usuarios'));
    }

    public function store(ProyectoRequest $request){
        $proyecto = $request->all();
        //$proyecto['id_usuario']=Auth::user()->id;
        
        $proyecto=Proyecto::create($proyecto);

        //TODO se crean 3 planos automaticamente asignados a este PROYECTO.
        //Por mientras
        $plano1=Plano::create([
            'name' => $proyecto->name."_Plano1",
            'id_proyecto' => $proyecto->id,
        ]);
        $plano2=Plano::create([
            'name' => $proyecto->name."_Plano2",
            'id_proyecto' => $proyecto->id,
        ]);
        $plano3=Plano::create([
            'name' => $proyecto->name."_Plano3",
            'id_proyecto' => $proyecto->id,
        ]);

        Session::flash('flash_message', 'Perfil creado con exito !');
        return redirect()->route('proyecto.index');
    }

    public function show(Request $request,$id){
        $proyecto=Proyecto::findOrFail($id);
        //var_dump($proyecto->planos);
        return view('proyecto.show',compact("proyecto"));
    }
    
    public function edit($id){
        $proyecto = Proyecto::findOrFail($id);
        $usuarios = User::all();

        return view('proyecto.edit',compact('proyecto','usuarios'));
    }

    public function update(ProyectoRequest $request, $id){
        $input=$request->all();
        $proyecto=Proyecto::findOrFail($id);
        $proyecto->fill($input)->save();

        Session::flash('flash_message', 'Perfil editado con exito !');
        return redirect()->route('proyecto.show',$id);

    }

    public function destroy($id){
        $proyecto = Proyecto::findOrFail($id);
        $proyecto->estado=0;
        $proyecto->save();
        Session::flash('flash_flash_message', 'Perfil deshabilitado con exito !');
        return redirect()->route('proyecto.index');
    }

    public function habilitar($id){
        $proyecto = Proyecto::findOrFail($id);
        $proyecto->estado=1;
        $proyecto->save();
        Session::flash('flash_flash_message', 'Perfil habilitado con exito !');
        return redirect()->route('proyecto.index');
    }
    
}
