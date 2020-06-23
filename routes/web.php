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

// listando cards
Route::get('/', 'CardsController@index');


/*Formulário no front envia informações para um método no back

Uma view lista registros buscando os mesmos em um método no back
*/

// Criando Card
Route::post('/', 'CardsController@create');
// acessa o locahost, e metodo dentro do CardsController vai pro CREATE

// alterando card
Route::put('/{id}', 'CardsController@edit');
// primeiro um parametro, depois uma rota : http://localhost/1
//1 = recebe um id/parametro