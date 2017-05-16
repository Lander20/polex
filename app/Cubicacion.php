<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cubicacion extends Model
{
    protected $fillable = [
        'id','id_plano','id_material'
    ];

    public function plano()
    {
        return $this->belongsTo('App\Plano','id_plano');
    }

    public function infoCubicacion()
    {
        return $this->belongsTo('App\InfoCubicacion','id');
    }
}
