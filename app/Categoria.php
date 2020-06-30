<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Categoria extends Model
{
    Protected  $table = 'categorias';
    Protected $fillable = [
        'id',
        'nombre'
    ];

    public function productos(){
       return $this->hasMany(Producto::class,'categorias_id');
    }
}
