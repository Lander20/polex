<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Plano extends Model{

    protected $fillable = [
        'id','name','url_image', 'id_proyecto','id_presupuesto'
    ];

    public function proyecto() {
        return $this->belongsTo('App\Proyecto','id_proyecto');
    }

    public function presupuesto()
    {
        return $this->hasOne('App\Presupuesto','id_plano');
    }
}
