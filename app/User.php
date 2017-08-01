<?php

namespace App;

use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable{
    protected $fillable = [
        'id','name', 'last_name','email', 'password','entry_date','id_perfil','state'
    ];

    protected $hidden = [
        'password', 'remember_token',
    ];

    public function perfil() {
        return $this->belongsTo('App\Perfil','id_perfil'); // Le indicamos que se va relacionar con el atributo id
    }

    public function proyectos(){
        return $this->hasMany('App\Proyecto','id_usuario');
    }
}
