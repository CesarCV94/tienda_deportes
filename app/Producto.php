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
        // return $this->belongsTo(Categoria::class,'categorias_id');
    }
    /*public function categorias(){
        return $this->belongsTo(Categoria::class);
    }
    public function categoria2(){
        return $this->belongsTo(Categoria::class,'categorias_id');
    }

    public function categorias3(){
        return $this->belongsToMany(Categoria::class,'productos_categorias','categorias_id','productos_id')
        ->withPivot('descripcion');
    }*/
}
