<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Log;

class Cubicacion extends Model
{
    protected $fillable = [
        'id','id_plano','id_material','quantity','id_info'
    ];

    public function plano(){
        return $this->belongsTo('App\Plano','id_plano');
    }

    public function infoCubicacion(){
        return $this->belongsTo('App\InfoCubicacion','id_info');
    }

    public function cubicacionMaterialDetalle(){
        return $this->hasMany('App\CubicacionMaterialDetalle','id_cubicacion');
    }

}
