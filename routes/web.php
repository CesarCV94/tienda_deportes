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

// Ruta de inicio
Route::resource('home','HomeController');

//ruta de productos
Route::resource('productos','ProductosController');

// rutas para filtrar productos por categoria
Route::get('productos-categorias/{id_categoria}','HomeController@getProductosPorCategoria')->name('productos.categoria');