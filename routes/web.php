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
//Professores
Route::get('/Professores', 'ProfessoresController@index')->name('prof');

Route::get('/admin', 'AdminController@index');
//Marcas
Route::resource('Marcas', 'MarcasController');
//Localizacoes
Route::resource('Localizacoes','LocalizacoesController');

Route::resource('TipoAvarias','TipoAvariasController');
//Estados
Route::get('/Estados', 'EstadosController@index')->name('estado');