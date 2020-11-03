<?php

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

Auth::routes();

Route::get('/clients',['uses' => 'ClientController@index', 'as' => 'client.index']);
Route::get('/clients/add',['uses' => 'ClientController@add', 'as' => 'client.add']);
Route::post('/clients/save',['uses' => 'ClientController@save', 'as' => 'client.save']);
Route::get('/clients/edit/{id}',['uses' => 'ClientController@edit', 'as' => 'client.edit']);
Route::put('/clients/update/{id}',['uses' => 'ClientController@update', 'as' => 'client.update']);
Route::get('/clients/delete/{id}',['uses' => 'ClientController@delete', 'as' => 'client.delete']);
Route::get('/clients/details/{id}',['uses' => 'ClientController@details', 'as' => 'client.details']);

Route::get('/telefone/add/{id}',['uses' => 'TelefoneController@add', 'as' => 'telefone.add']);
Route::post('/telefone/save/{id}',['uses' => 'TelefoneController@save', 'as' => 'telefone.save']);
Route::get('/telefone/edit/{id}',['uses' => 'TelefoneController@edit', 'as' => 'telefone.edit']);
Route::put('/telefone/update/{id}',['uses' => 'TelefoneController@update', 'as' => 'telefone.update']);
Route::get('/telefone/delete/{id}',['uses' => 'TelefoneController@delete', 'as' => 'telefone.delete']);
