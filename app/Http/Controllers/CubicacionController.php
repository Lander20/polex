<?php

namespace App\Http\Controllers;

use App\InfoCubicacion;
use App\Material;
use App\Plano;
use Illuminate\Http\Request;
use Session;
use App\Http\Requests;

class CubicacionController extends Controller{

    public function selected($idProyecto, $idPlano, $idCubicacion){
        $cubicacionesByPlano = InfoCubicacion::whereHas('cubicaciones', function ($query) use ($idPlano){
            $query->where('id_plano',$idPlano);
        })->get();

        foreach ($cubicacionesByPlano as $cubicacion){
            $cubicacion->selected=false;
            $cubicacion->save();
        }
        $cubicacion = InfoCubicacion::find($idCubicacion);
        $cubicacion->selected=true;
        $cubicacion->save();
        Session::flash('flash_message', 'Cubicación seleccionada !');
        return back();
    }

    public function create($idProyecto, $idPlano, Request $request){
        $materiales = Material::all();

        $plano = Plano::find($idPlano);
        $plano->url_image=explode("public",$plano->url_image)[1];

        return view('cubicacion.create', compact('plano','materiales'));
    }

}
