<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Perfil extends Model
{

    protected $fillable = [
        'name','description','id'
    ];

    protected $hidden = ['created_at', 'updated_at'];

    public function usuarios(){
        return $this->hasMany('App\User','id_perfil');
    }
}
