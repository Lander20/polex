<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Proyecto extends Model
{
    protected $fillable = [
        'name', 'id_usuario'
    ];

    public function usuario() {
        return $this->belongsTo('App\Usuario','id_usuario');
    }
}
