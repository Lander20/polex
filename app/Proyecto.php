<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Proyecto extends Model{
    protected $fillable = [
        'name', 'id_usuario','shortname'
    ];

    public function usuario() {
        return $this->belongsTo('App\User','id_usuario');
    }

    public function planos(){
        return $this->hasMany('App\Plano','id_proyecto');
    }

}
