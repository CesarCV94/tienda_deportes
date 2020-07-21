<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Categoria;
use Alert;
class CategoriasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //consulta de categorias
        $categorias = Categoria::with('productos')->get();
        return view('categorias.index',compact('categorias'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
         //consulta de categorias
         $categorias = Categoria::with('productos')->get();
         return view('categorias.create',compact('categorias'));
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //inserta el nuevo registro
        Categoria::create($request->all());

        //incluir toast
        Alert::success('Categoria creada existosamente');
        // retorna ruta categorias
        return redirect('categorias');
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
        //consulta de categorias
        $categorias = Categoria::with('productos')->get();
        //obtenemos el registro a editar
        $cate = Categoria::findOrFail($id);
        return view('categorias.edit',compact('cate','categorias'));
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
        Alert::info('Categoría actualizada exitosamente');
        //actualiza el registro
        Categoria::findOrFail($id)->update($request->all());
        return redirect('categorias');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //eliminamos el registro 
        Categoria::findOrFail($id)->delete();
        //alert
        Alert::warning('Categoría eliminada existosamente');
        return redirect('categorias');
    }
}
