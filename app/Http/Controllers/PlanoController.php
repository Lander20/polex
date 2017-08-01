<?php

namespace App\Http\Controllers;

use App\InfoCubicacion;
use App\Cubicacion;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Requests\PlanoRequest;
use App\Proyecto;
use App\Plano;
use File;
use Illuminate\Support\Facades\Input;
use Intervention\Image\Facades\Image;

class PlanoController extends Controller{

    public function create($idProyecto, Request $request){
        $proyecto = Proyecto::findOrFail($idProyecto);

        $input=$request->all();
        $name =$proyecto->shortname."-".$input["name"];

        $plano=$proyecto->planos()->where('name',$name)->first();

        if($plano){
            return redirect()->back();
        }
        else{
            $plano = new Plano();
            $plano->name = $proyecto->shortname."-".$input["name"];
            $plano->id_proyecto = $proyecto->id;
            $plano->save();
            return redirect()->back();
        }
    }

    public function show($idProyecto,$idPlano){
        $proyecto = Proyecto::findOrFail($idProyecto);
        $plano=$proyecto->planos()->where('id',$idPlano)->first();

        $infoCubicaciones = InfoCubicacion::whereHas('cubicaciones', function ($query) use ($idPlano){
            $query->where('id_plano',$idPlano);
        })->get();

        return view('plano.show',compact('proyecto','plano',"infoCubicaciones"));
    }

    public function destroy($idProyecto,$idPlano){
        $proyecto = Proyecto::findOrFail($idProyecto);

        if(count($plano=$proyecto->planos()->get())>1){
            $this->deletePlano($idPlano);

            return redirect()->back();
        }
        else{
            return redirect()->back();
        }

    }

    public function uploadImagePlano(Request $request){
        $url=explode("/",explode("/proyecto",url()->current())[1]);

        $idProyecto=$url[1];
        $idPlano=$url[3];

        $plano=Plano::find($idPlano);

        $image = Input::file('image');
        $filename  = time() . '.png';

        $path = public_path().('/proyectos/'.$idProyecto.'/plano/'.$idPlano.'/');

        File::makeDirectory($path, $mode = 0775, true, true);

        $path=$path.$filename;
        $plano->url_image=$path;
        $plano->save();

        $img=Image::make($image)->save($path);
        $size=$this->sizeImage($image);
        //$img = Image::make($path);
        return redirect()->back()->with('flash_message', 'Imagen guardada');
    }

    public function sizeImage($image){
        $size = explode(' ',getimagesize($image)[3]);
        $width = $size[0];
        $height = $size[1];

        $tmp = preg_replace("/[^0-9]/", '', $width);
        $tmp1 = preg_replace("/[^0-9]/", '', $height);

        return array("width"=> $tmp,"height"=>$tmp1);
    }

    public function deletePlano($idPlano){
        $plano=Plano::find($idPlano);

        $infoCubicaciones = InfoCubicacion::whereHas('cubicaciones', function ($query) use ($idPlano){
            $query->where('id_plano',$idPlano);
        })->get();

        foreach ($infoCubicaciones as $info) {
            foreach($info->cubicaciones as $cubicacion){
                foreach ($cubicacion->cubicacionMaterialDetalle()->get() as $detalle) {
                    return $detalle->delete();
                }
                $cubicacion->delete();
            }
            $info->delete();
        }
        $plano->delete();
    }

    public function presupuesto($idProyecto, $idPlano){

    }
}
