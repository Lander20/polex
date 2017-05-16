<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class InfoCubicacion extends Model
{
    protected $fillable = [
        'id','name','selected'
    ];

    public function cubicaciones()
    {
        return $this->hasMany('App\Cubicacion','id');
    }

    public function cubicacionesByPlano($id){
        return Cubicacion::where('id_plano',$id)->get();
    }
}
