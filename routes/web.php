<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

//rutas protegidas por el middleware auth
Route::group(['middleware' => ['auth']],function(){
    // Ruta de inicio
    Route::resource('home2','Home2Controller');

    //ruta de productos
    Route::resource('productos','ProductosController');

    // rutas para filtrar productos por categoria
    Route::get('productos-categorias/{id_categoria}','Home2Controller@getProductosPorCategoria')->name('productos.categoria');

    //ruta para ejercicios de eloquent
    Route::get('consultas-eloquent','ProductosController@consultas');

    // ruta para ejercicios de consultas DB
    Route::get('consultas-db','ProductosController@consultasDB');

    // ruta para ejemplo de relaciones
    Route::get('relaciones','ProductosController@relaciones');

}); 

Route::group(['middleware' => ['access-token']],function(){
    route::get('prueba-middleware',function(){
        return 'Accesso Permitido';
    });
});
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
