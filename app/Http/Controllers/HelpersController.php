<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HelpersController extends Controller
{
    // funcion para pobrar nuestro archivos helpers.php
    public function pruebaHelper(){
        // consulta la funcion getProductosMayPrecio de nuestro archivo helpers.php
        $productos = getProductosMayPrecio();
        // retorna la vista helpers
        return view('helpers',compact('productos'));
    }
}
