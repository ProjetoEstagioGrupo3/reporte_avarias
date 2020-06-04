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
    return view('Auth/login');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
//Equipamentos
Route::get('/Equipamentos', 'EquipamentosController@index')->name('Equipamentos');
Route::get('/Computadores', 'EquipamentosController@pcs')->name('pc');
Route::get('/Projetores', 'EquipamentosController@projets')->name('projet');
Route::get('/Switchs', 'EquipamentosController@switchs')->name('switch');
Route::get('/Bastidores', 'EquipamentosController@basts')->name('bast');
Route::get('/AccesPointss', 'EquipamentosController@accesPs')->name('accesP');


Route::group(['middleware' => ['auth']], function () {
    Route::get('/admin', 'AdminController@index');
    Route::resource('Marcas', 'MarcasController');
    Route::resource('Equipamentos', 'EquipamentosController');
    Route::resource('Tipos', 'TipoController');
    Route::resource('Localizacoes','LocalizacoesController');
    Route::resource('TipoAvarias','TipoAvariasController');
    
    /*Route::group(['middleware' => ['admin']], function () {
        Route::resource('admin', 'AdminController');
        Route::delete('/reservas/{id}', 'AdminController@apagar');
        Route::get('/confirmacao/{id}', 'AdminController@confirmacao');
        Route::get('/reservas', 'AdminController@reservas');
    });*/
});