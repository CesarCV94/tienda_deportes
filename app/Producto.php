<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Producto extends Model
{
    Protected $table = 'productos';
    Protected $fillable = [
        'id',
        'nombre',
        'descripcion',
        'precio',
        'categorias_id'
    ];
    public $timestamps = false;

    public function categoria(){
        return $this->belongsTo('App\Categoria','categorias_id');
    }
}
