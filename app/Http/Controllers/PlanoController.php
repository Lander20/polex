<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Proyecto;
use App\Plano;
use File;
use Illuminate\Support\Facades\Input;
use Intervention\Image\Facades\Image;

class PlanoController extends Controller{

    public function planosByProyecto($idProyecto,$idPlano){
        $proyecto = Proyecto::findOrFail($idProyecto);
        $plano=$proyecto->planos()->where('id',$idPlano)->first();
        $presupuestos=$plano->presupuesto()->get();

        return view('plano.show',compact('proyecto','plano',"presupuestos"));
    }
    
    public function uploadImagePlano(Request $request){
        $url=explode("/",explode("/proyecto",url()->current())[1]);
        $idProyecto=$url[1];
        $idPlano=$url[3];

        $plano=Plano::find($idPlano);

        $image = Input::file('image');
        $filename  = time() . '.png';

        $path = public_path().('/proyectos/'.$idProyecto.'/plano/'.$idPlano.'/');
        File::makeDirectory($path, $mode = 0777, true, true);
        //$path = public_path().('/proyectos/'.$idProyecto.'/plano/'.$idPlano.'/' . $filename);
        $path=$path.$filename;
        $plano->url_image=$path;
        $plano->save();

        $img=Image::make($image)->save($path);

        $img = Image::make($path);
        return redirect()->back()->with('flash_message', 'Imagen reemplazada');
    }

    public function createPresupuesto($idProyecto, $idPlano, Request $request){
        $plano = Plano::find($idPlano);
        $plano->url_image=explode("public",$plano->url_image)[1];
        return view('plano.presupuestoCreate', compact('plano'));
    }
}
