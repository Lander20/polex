<?php

namespace App;

use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'last_name','email', 'password','entry_date','id_perfil','estado'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function perfil() {
        return $this->belongsTo('App\Perfil','id_perfil'); // Le indicamos que se va relacionar con el atributo id
    }

    public function proyectos()
    {
        return $this->hasMany('App\Proyecto','id_usuario');
    }
}
