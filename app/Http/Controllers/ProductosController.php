<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
//modelos utilizados
use App\Categoria;
use App\Producto;
class ProductosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //retorna las categorias
        $categorias = Categoria::all();
        //retorna los productos
        $productos = Producto::with('categoria')->get();

        return view('productos.index',compact('categorias','productos'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //retorna las categorias
        $categorias = Categoria::all();

        return view('productos.crear',compact('categorias'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Producto::create($request->all());
        return redirect('productos');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {   
         //retorna las categorias
         $categorias = Categoria::all();
        $producto = Producto::findOrFail($id);
        return view('productos.edit',compact('producto','categorias'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        Producto::findOrFail($id)->update($request->all());
        return redirect('productos');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Producto::findOrFail($id)->delete();
        return redirect('productos');
    }
}
