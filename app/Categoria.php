<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Categoria extends Model
{
    Protected  $table = 'categorias';
    // con esta línea no usara los campos created_at,update_at
    //public $timestamps = false;

    // en el caso que nuestra llave primaria no sea id se debe agregar esta linea
    //protected $primarykey = 'clave';

    //con esta linea especificamos que nuestra llave primaria no es un entero
    //protected $keyType = 'string';

    // si nuestra llave primaria no es autoincremental
    //protected $incrementing = false;

    Protected $fillable = [
        'id',
        'nombre'
    ];

    public function productos(){
       return $this->hasMany(Producto::class,'categorias_id');
    }
}
