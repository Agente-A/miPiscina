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


Route::get('/piscina/{piscina}/administrar','PiscinaController@show')
    ->name('piscina.show');