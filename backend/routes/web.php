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

Route::POST('/usuario/save', 'UsuarioController@cadastraUsuario');
Route::prefix('/produto')->group(function(){
    Route::GET('/get-produtos', 'ProdutoController@getProdutos')->middleware('cors');
    Route::GET('/get-produto-detalhe/{rotuloUnico}', 'ProdutoController@getProdutoDetalhe')->middleware('cors');
    Route::POST('/save', 'ProdutoController@addProduto')->middleware('cors');
});

Route::prefix('/local')->group(function(){
    Route::GET('/get-ufs', 'LocalController@getUfs')->middleware('cors');
    Route::GET('/get-cidade-by-uf/{uf}', 'LocalController@getCidadeByUf')->middleware('cors');
    Route::GET('/get-endereco-by-cep/{cep}', 'LocalController@getEnderecoByCep')->middleware('cors');
});