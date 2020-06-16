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




Route::get('/', 'PiscinaController@index')
    ->name('index');

    // Formulario registro admin
Route::get('/admin/registro', 'AdministradorController@create')
    ->name('admin.create');

    // Registro de admin en la DB
Route::post('/admin/','AdministradorController@store');

    // Iniciar Sesion
Route::post('/admin/login', 'AdministradorController@login');

    // Cerrar Sesion
Route::get('/admin/logout', 'AdministradorController@logout')
    ->name('admin.logout');

    // Detalles de una piscina
Route::get('/piscina/{piscina}/administrar','PiscinaController@show')
    ->name('piscina.show');

    // Formulario Modificacion piscina
Route::get('/piscina/{piscina}/modificar','PiscinaController@edit')
    ->name('piscina.edit');    
    
    // Modificacion de piscina en la DB
Route::put('/piscina/{piscina}','PiscinaController@update');

    // Formulario registro piscina
Route::get('/piscina/registro','PiscinaController@create')
    ->name('piscina.create');

    // Registro de piscina en la DB
Route::post('/piscina/','PiscinaController@store');

    // Eliminar piscina
Route::delete('/piscina/{piscina}', 'PiscinaController@destroy')
    ->name('Piscina.destroy');

        // Ajax
Route::post('/ajax/','AjaxController@index')->name('ajax.index');