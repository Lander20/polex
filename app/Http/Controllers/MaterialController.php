<?php

namespace App\Http\Controllers;

use App\Material;
use Illuminate\Http\Request;
use Session;
use App\Http\Requests;
use App\Http\Requests\MaterialRequest;

class MaterialController extends Controller{

    public function index(){
        $materiales= Material::all();
        //return $materiales;
        return view("material.index",compact("materiales"));
    }

    public function create(){
        return view("material.create");
    }

    public function edit(Material $material){
        //$material = Material::find($id);
        return view("material.edit",compact("material"));
    }

    public function store(MaterialRequest $request){
        $input = $request->all();
        $material = Material::create();
        $material->fill($input)->save();
        Session::flash('message', 'Material creado con exito !');
        return redirect()->route("material.index");
    }

    public function update(MaterialRequest $request, Material $material){
        //$material = Material::find($id);
        $input= $request->all();
        $material->fill($input)->save();
        Session::flash('message', 'Material modificado con exito !');
        return redirect()->route("material.index");
    }

    public function delete($id){
        $material = Material::find($id);
        $material->delete();
        //TODO realizar comprobación en las cubicaciones antes de su eliminación
        return redirect()->route("material.index");
    }

    public function show(MaterialRequest $request){

    }
}
