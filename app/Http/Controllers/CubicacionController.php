<?php

namespace App\Http\Controllers;

use App\Cubicacion;
use App\CubicacionMaterialDetalle;
use App\InfoCubicacion;
use App\Material;
use App\Plano;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Session;
use App\Http\Requests;
use Illuminate\Support\Facades\Route;

class CubicacionController extends Controller
{

    public function selected($idProyecto, $idPlano, $idCubicacion)
    {
        $cubicacionesByPlano = InfoCubicacion::whereHas('cubicaciones', function ($query) use ($idPlano) {
            $query->where('id_plano', $idPlano);
        })->get();

        foreach ($cubicacionesByPlano as $cubicacion) {
            $cubicacion->selected = false;
            $cubicacion->save();
        }
        $cubicacion = InfoCubicacion::find($idCubicacion);
        $cubicacion->selected = true;
        $cubicacion->save();
        Session::flash('flash_message', 'Cubicación seleccionada !');
        return back();
    }

    public function create($idProyecto, $idPlano, Request $request){
        $plano = Plano::find($idPlano);

        $info=new InfoCubicacion();
        $info->url_image = explode("public",$plano->url_image)[1];
        $info->name= "Cubicación ".random_int(1,100);
        $info->save();

        $cubicacion = new Cubicacion();
        $cubicacion->id_plano = $idPlano;
        $cubicacion->id_info = $info->id;
        $cubicacion->save();

        return redirect(route(  'cubicacion.show',[$idProyecto,$idPlano,$info->id]));
    }

    public function show($idProyecto, $idPlano, $idInfoCubicacion){
        $infoCubicacion = InfoCubicacion::find($idInfoCubicacion);

        $cubicacions = Cubicacion::where([['id_info',$idInfoCubicacion],['id_plano',$idPlano]])->get();

        return view('cubicacion.edit', compact('infoCubicacion','cubicacions'));
    }

    public function guardar(Request $request){
        $urls = explode("/",url()->current());

        foreach ($urls as $id => $url) {
            if($url=="proyecto"){
                $idProyecto=$urls[$id+1];
                $idPlano=$urls[$id+3];
                $idInfo=$urls[$id+5];
            }
        }

        if(count($request["material"])){
            foreach ($request["material"] as $idMat => $material){
                Log::info("--------------------------------------------------------------------------");
                if($material != null){
                    //Log::info($material[0]);
                    $cubicacion = Cubicacion::where([['id_info',$idInfo],['id_plano',$idPlano],['id_material',$idMat]])->first();
                    Log::info("cubicacion = ".$cubicacion);
                    if(isset($cubicacion)){
                        $cubicacion->quantity = $material[0];
                        $cubicacion->save();
                        /*Log::info($material[1]);
                        Log::info("if".$cubicacion);*/
                        for($i=1;$i<count($material[1]);$i++){
                            $detalle1 = CubicacionMaterialDetalle::where([["id_cubicacion",$cubicacion->id],["id_material",$idMat],["position",$i]])->first();
                            //Log::info($detalle1);
                            if(count($detalle1)){
                                $detalle1->positionX = round($material[1][$i],5);
                                $detalle1->positionY = round($material[2][$i],5);
                                //Log::info("old => ".$detalle1);
                                $detalle1->save();
                            }
                            else{
                                $detalleN = new CubicacionMaterialDetalle();
                                $detalleN->id_cubicacion = $cubicacion->id;
                                $detalleN->id_material = $idMat;
                                $detalleN->position = $i;
                                $detalleN->positionX = round($material[1][$i],5);
                                $detalleN->positionY = round($material[2][$i],5);
                                //Log::info("new => ".$detalleN);
                                $detalleN->save();
                            }
                        }
                    }
                    else{
                        //Log::info("else");
                        $cubicacion = new Cubicacion();
                        $cubicacion->id_info = $idInfo;
                        $cubicacion->id_plano = $idPlano;
                        $cubicacion->id_material= $idMat;
                        $cubicacion->quantity = $material[0];
                        $cubicacion->save();

                        for($i=1; $i<count($material[1]);$i++){
                            $detalle = new CubicacionMaterialDetalle();
                            $detalle->id_cubicacion = $cubicacion->id;
                            $detalle->id_material = $idMat;
                            $detalle->position = $i;
                            $detalle->positionX = round($material[1][$i],5);
                            $detalle->positionY = round($material[2][$i],5);
                            $detalle->save();
                        }

                    }
                }
            }
        }

        return 1;
    }

    public function eliminar(Request $request){
        $urls = explode("/",url()->current());

        foreach ($urls as $id => $url) {
            if($url=="proyecto"){
                $idProyecto=$urls[$id+1];
                $idPlano=$urls[$id+3];
                $idInfo=$urls[$id+5];
            }
        }

        if(count($request["materialEliminar"])){
            Log::info($request["materialEliminar"]);

            $detalleDelete = $request["materialEliminar"];
            $cubicacion = Cubicacion::where([['id_info',$idInfo],['id_plano',$idPlano],['id_material',$detalleDelete[0]]])->first();
            $cubicacion->quantity = ($detalleDelete[1]-1);
            $cubicacion->save();
            $detalle = CubicacionMaterialDetalle::where([["id_cubicacion",$cubicacion->id],["id_material",$detalleDelete[0]],["position",$detalleDelete[1]]])->first();
            if(isset($detalle)){
                Log::info($detalle);
                $detalle->delete();
            }
            else{
                Log::info("vacio");
            }
        }
    }

    public function reset(Request $request){
        $urls = explode("/",url()->current());

        foreach ($urls as $id => $url) {
            if($url=="proyecto"){
                $idProyecto=$urls[$id+1];
                $idPlano=$urls[$id+3];
                $idInfo=$urls[$id+5];
            }
        }

        if(count($request["materialEliminar"])==1){
            Log::info($request["materialEliminar"]);

            $idMaterial = $request["materialEliminar"][0];

            $cubicacion = Cubicacion::where([['id_info',$idInfo],['id_plano',$idPlano],['id_material',$idMaterial]])->first();

            CubicacionMaterialDetalle::where([["id_cubicacion",$cubicacion->id],["id_material",$idMaterial]])->delete();

            //Log::info($detalles);
            /*if(isset($detalle)){
                          Log::info($detalle);
                          $detalle->delete();
                      }
                      else{
                          Log::info("vacio");
                      }*/
        }
    }

    public function detalle(Request $request){
        $urls = explode("/",url()->current());

        foreach ($urls as $id => $url) {
            if($url=="proyecto"){
                $idProyecto=$urls[$id+1];
                $idPlano=$urls[$id+3];
                $idInfo=$urls[$id+5];
            }
        }

        $response = array();
        $cubicacions = Cubicacion::where([['id_info',$idInfo],['id_plano',$idPlano]])->get();
        //return $cubicacions;
        foreach($cubicacions as $cubicacion){
            if(count($cubicacion)){
                foreach($cubicacion->cubicacionMaterialDetalle()->get() as $index => $detalle){
                    //array_push($response,array())
                    $response["mat-".$cubicacion->id_material][$index] = $detalle;
                    //<i class="i-img mat-{{$detalle->id_material}}" style="top:{{$detalle->positionY}}%;left:{{$detalle->positionX}}%;">x</i>
                }
            }
        }
        return ($response);

    }

}
