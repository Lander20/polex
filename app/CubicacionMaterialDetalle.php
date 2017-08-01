<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CubicacionMaterialDetalle extends Model{

    protected $fillable = [
        'id','id_cubicacion','id_material','position','positionX','positionY'
    ];

    protected $hidden = [
        'created_at', 'updated_at',
    ];

    public function cubicacion()
    {
        return $this->belongsTo('App\Cubicacion','id_cubicacion');
    }
}
