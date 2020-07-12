<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Producto;
use Illuminate\Http\Response;
use DB;
use Exception;
use App\Http\Requests\ProductoRequest;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Validator;

class ApiProductosController extends Controller
{
    //private $producto;
    public function productos(){
        // buscar por eloquent
        //$productos = Producto::with('categoria')->get();
        // buscar utilizando DB
        $productos = DB::table('productos as p')
            ->join('categorias as c','p.categorias_id','=','c.id')
            ->select('p.id','p.descripcion','p.nombre','p.precio',
                DB::raw('c.nombre as categoria')
            )
            ->get();

        return response()->json([
            'productos' => $productos
        ],Response::HTTP_OK);
    }
    public function buscarPorId($id){
            // buscar por eloquent
            //$producto = Producto::findOrfail($id);

            //buscar usando DB
            $producto = DB::table('productos as p')
                ->where('p.id',$id)
                ->get();
        if(count($producto) <= 0){
            return response()->json([
                'mensaje' => 'Producto no encontrado'
            ],Response::HTTP_OK);
        }
        
        return response()->json([
            'producto' => $producto
        ],Response::HTTP_OK);
    }

    public function registrarProducto(ProductoRequest $request){
        $producto = Producto::create($request->all());

        return response()->json([
            'mensaje' => 'Producto registrado correctamente',
            'producto' => $producto
        ]);
    }
    public function updateProducto(Request $request, $id){

        // validar los campos del request
        $validator = Validator::make($request->all(),[
            'nombre'        => 'required',
            'descripcion'   => 'required|max:20',
            'precio'        => 'required|numeric',
            'categorias_id' => 'required|exists:categorias,id'
        ]);
        // si la validacion tiene errores retornamos el error.
        if($validator->fails()){
            return response()->json(['error' => $validator->errors()],401);
        }
       
       // llama a la funcion para buscar si existe el producto
        $flag = $this->findProducto($id);

        // si no existe retorna el error.
        if(!$flag){
            return response()->json([
                'mensaje' => 'El producto con id: '.$id.' No existe.'
            ],404);
        }

        $this->producto->update($request->all());
        return response()->json([
            'mensaje' => 'Producto actualizado Correctamente',
            'producto' => $this->producto
        ],Response::HTTP_OK);
    }

    public function deleteProducto($id){
        // llama a la funcion para buscar si existe el producto
        $flag = $this->findProducto($id);

        // si no existe retorna el error.
        if(!$flag){
            return response()->json([
                'mensaje' => 'El producto con id: '.$id.' No existe.'
            ],404);
        }
        $this->producto->delete();
        return response()->json([
            'mensaje' => 'Producto eliminado correctamente'
        ],Response::HTTP_OK);
    }

    private function findProducto($id){
        try {
            $this->producto = Producto::findOrFail($id);
            return true;
        } catch (ModelNotFoundException $e) {
            return false;
        }
    }
}
