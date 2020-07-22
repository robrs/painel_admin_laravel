<?php

use Illuminate\Support\Facades\Auth;
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


//Route::get('/', ['as' => 'frontend.home', 'uses' => 'Frontend\HomeController@index']);

Route::get('/login', ['as' => 'auth.login', 'uses' => 'Auth\LoginController@index']);
Route::get('/login/sair', ['as' => 'auth.logout', 'uses' => 'Auth\LoginController@sair']);
Route::post('/login/entrar', ['as' => 'site.login.entrar', 'uses' => 'Auth\LoginController@entrar']);

Route::group(['middleware' => 'auth'], function () {

    Route::get('/', ['as' => 'dashboard', 'uses' => 'Backend\DashBoardController@index']);

    // Produto
    Route::get('/produto/admin', ['as' => 'produtos', 'uses' => 'Backend\ProdutoController@admin']);
    Route::get('/produto/create', ['as' => 'produto.create', 'uses' => 'Backend\ProdutoController@create']);
    Route::post('/produto/store', ['as' => 'produto.store', 'uses' => 'Backend\ProdutoController@store']);
    Route::get('/produto/edit/{id}', ['as' => 'produto.edit', 'uses' => 'Backend\ProdutoController@edit']);
    Route::put('/produto/update/{id}', ['as' => 'produto.update', 'uses' => 'Backend\ProdutoController@update']);
    Route::delete('/produto/delete/{id}', ['as' => 'produto.delete', 'uses' => 'Backend\ProdutoController@delete']);

    // Categoria
    Route::get('/categoria/index', ['as' => 'categorias', 'uses' => 'Backend\CategoriaController@index']);
    Route::get('/categoria/create', ['as' => 'categoria.create', 'uses' => 'Backend\CategoriaController@create']);
    Route::post('/categoria/store', ['as' => 'categoria.store', 'uses' => 'Backend\CategoriaController@store']);
    Route::get('/categoria/edit/{id}', ['as' => 'categoria.edit', 'uses' => 'Backend\CategoriaController@edit']);
    Route::put('/categoria/update/{id}', ['as' => 'categoria.update', 'uses' => 'Backend\CategoriaController@update']);
    Route::delete('/categoria/destroy/{id}', ['as' => 'categoria.destroy', 'uses' => 'Backend\CategoriaController@destroy']);

});


Auth::routes();
Route::get('/dashboard', ['as' => 'dashboard', 'uses' => 'Backend\DashBoardController@index']);

