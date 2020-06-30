<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
//incluir las clases
use App\Categoria;
use App\Producto;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        //retorna las categorias
        $categorias = Categoria::all();
        $productos = Producto::all();
       
        return view('home2',compact('categorias','productos'));
    }
}
