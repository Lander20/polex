<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Presupuesto extends Model{
    
    protected $fillable = [
        'id','id_plano'
    ];

    public function plano()
    {
        return $this->belongsTo('App\Plano','id_plano');
    }
}
