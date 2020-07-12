<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

//ruta para registrar usuarios desde la api
Route::post('register','UserController@register');

//ruta para obtener datos del cliente auth
Route::post('client-auth','UserController@AuthClient');

// retorna que no esta autorizado
Route::get('/unauthorized','UserController@unauthorized');

// rutas para nuestro middleware de la api
Route::group(['middleware' => ['CheckApiCredentials','auth:api']],function(){
    //ruta para cerrar sesión
    Route::post('logout','UserController@logout');

    // ruta para ver el estado del usuario
    Route::post('details','UserController@details');

    // retorna los productos
    Route::get('productos','ApiProductosController@productos');

    // busca productos por el id
    Route::get('productos/{id}','ApiProductosController@buscarPorId');

    // registrar nuevo producto 
    Route::post('productos','ApiProductosController@registrarProducto');

    //actualizar producto
    Route::put('productos/{id}','ApiProductosController@updateProducto');

    // eliminar producto
    Route::delete('productos/{id}','ApiProductosController@deleteProducto');

});