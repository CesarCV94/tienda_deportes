<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
//modelos utilizados
use App\Categoria;
use App\Producto;
use App\Http\Requests\ProductoRequest;

// incluir DB
//use Illuminate\Support\Facades\DB;
use DB;

class ProductosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

     //descomentar para verificar la ruta protegida
   /* public function __construct()
    {
        $this->middleware('auth');
    }*/

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
    public function store(ProductoRequest $request)
    {
        Producto::create($request->all());
        return redirect('productos')->with('alert', ' Producto agregado correctamente.');;


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

    public function consultas(){
        // retorna los productos donde el precio es mayor a 100
        //$productos = Producto::where('precio','>',100)->get();

        //retorna la suma de precios donde la categoria es igual a catagoria 1
        //$total = Producto::where('categorias_id',1)->sum('precio');

        //retorna el numero de registros que pertecenen a la categoria 1
        $count = Producto::where('categorias_id',1)->count();

        //retorna el primer producto donde categoria es igual a 1
        $producto = Producto::where('categorias_id',1)->first();

        // retorna los productos donde su precio este entre 100 y 200
        //$productos = Producto::whereBetween('precio',[100,200])->get();
         $productos = Producto::where('precio','>=',100)->where('precio','<=',200)->get();
        // retorna producto donde el nombre es igual a PLAYERA
        $producto =Producto::whereNombre('PLAYERA')->get();

        dd($producto);

    }
    public function relaciones(){
        //retorna el pruducto con id 1 y su relacion categoria1
        //$producto =Producto::where('id',1)->with('categoria1')->get();

         //retorna el pruducto con id 1 y su relacion categorias
         //$producto =Producto::where('id',1)->with('categorias')->get();
          //retorna el pruducto con id 1 y su relacion categoria2
          //$producto =Producto::where('id',1)->with('categoria2')->get();
        
        // imprimir variables en el navegador con un paro de ejecucion
        //dd('aqui va lo que deseas mostrar');

        $categorias = Categoria::with('productos')->get();
        dd($categorias);
    }
    public function consultasDB(){
        //retorna todos los productos
       /*$productos = DB::table('productos as p')
                    ->join('categorias as c','p.categorias_id','=','c.id')
                    ->select(DB::raw("
                        p.id as id_producto,
                        p.nombre as nombre_producto,
                        p.descripcion,
                        p.precio,
                        c.nombre as nombre_categoria,
                        c.id as id_categoria"))->get();*/

        dd($productos);
        /* $productos = DB::table('productos as p')
                                ->select(
                                    DB::raw("p.id,p.nombre,p.descripcion,p.precio"),
                                    DB::raw("(select nombre from categorias where id =p.categorias_id) as categoria")
                                )->get(); */
         // insertar registros con DB                       
       /* DB::table('productos')->insert([
            'nombre' => 'RAQUETA',
            'descripcion' => 'RAQUETA AMARILLA',
            'precio'   =>  200,
            'categorias_id' => 2
        ]); */
        
        // actualizar registro con DB
        /*DB::table('productos')->where('id',6)->update([ 
            'precio'   =>  250
        ]);*/
        
        // eliminar un registro con DB
       /* DB::table('productos')->where('id',6)->delete();*/
        
    }
}
