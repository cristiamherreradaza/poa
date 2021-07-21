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

// Route::get('home', 'SocialController@inicio')->name('home');


/*Route::get('/home', function () {
    return view('home');
});*/

// Route::get('/', 'SocialController@inicio');
Route::get('/', 'UserController@listado');
// Route::get('/', 'home');

Auth::routes();

// PANEL DE CONTROL
Route::get('/home', 'PanelController@inicio');
Route::get('Panel/inicio', 'PanelController@inicio');

// RED SOCIAL
Route::get('Social/inicio', 'SocialController@inicio');

// USUARIOS
Route::get('User/listado', 'UserController@listado');
Route::get('User/nuevo', 'UserController@nuevo');
Route::get('User/ajax_listado', 'UserController@ajax_listado');
Route::get('User/edita/{id}', 'UserController@edita');
Route::get('User/elimina/{id}', 'UserController@elimina');

// TIPOS INSUMOS
Route::get('TiposInsumo/listado', 'TiposInsumoController@listado');
Route::post('TiposInsumo/guarda', 'TiposInsumoController@guarda');
Route::get('TiposInsumo/elimina/{tipo_id}', 'TiposInsumoController@elimina');

// PARTIDAS
Route::get('Partida/listado', 'PartidaController@listado');
Route::post('Partida/guarda', 'PartidaController@guarda');
Route::get('Partida/elimina/{tipo_id}', 'PartidaController@elimina');

// ORGANISMO FINANCIADOR
Route::get('OrganismoFinanciador/listado', 'OrganismoFinanciadorController@listado');
Route::post('OrganismoFinanciador/guarda', 'OrganismoFinanciadorController@guarda');
Route::get('OrganismoFinanciador/elimina/{tipo_id}', 'OrganismoFinanciadorController@elimina');

// PROYECTO
Route::get('Proyecto/registro', 'ProyectoController@registro');

// TIPOS OPERECIONES
Route::get('TiposOperacion/listado', 'TiposOperacionController@listado');
Route::post('TiposOperacion/guarda', 'TiposOperacionController@guarda');
Route::get('TiposOperacion/elimina/{tipo_id}', 'TiposOperacionController@elimina');

// TIPOS GASTOS
Route::get('TiposGasto/listado', 'TiposGastoController@listado');
Route::post('TiposGasto/guarda', 'TiposGastoController@guarda');
Route::get('TiposGasto/elimina/{tipo_id}', 'TiposGastoController@elimina');

