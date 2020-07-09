<?php

use App\Producto;

// retorna el nombre del usuario logeado
function current_user(){
    return auth()->user()->name;
}
function getEmailUser(){
    return auth()->user()->email;
}

// retorna los productos donde el precio es mayor a 200
function getProductosMayPrecio(){
    $productos = Producto::where('precio','>',200)->get();
    return $productos;
}