<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Perfil extends Model
{

    protected $fillable = [
        'name','estado'
    ];

    protected $hidden = ['created_at', 'updated_at'];

    public function Usuarios()
    {
        return $this->hasMany('App\User');
    }
}
