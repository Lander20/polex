<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Plano extends Model{
    protected $fillable = [
        'id','name','url_image', 'id_proyecto'
    ];

    public function proyecto() {
        return $this->belongsTo('App\Proyecto','id_proyecto');
    }

    public function cubicaciones(){
        return $this->hasMany('App\Cubicacion','id_plano');
    }

}
