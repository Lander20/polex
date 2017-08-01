<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class InfoCubicacion extends Model
{
    protected $fillable = [
        'id','name','url_image','selected'
    ];

    public function cubicaciones()
    {
        return $this->hasMany('App\Cubicacion','id_info');
    }

}
