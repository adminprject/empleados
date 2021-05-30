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

Route::get('empleados','empleadosController@index');
Route::get('empleados/create','empleadosController@create');
Route::post('empleados','empleadosController@store');
Route::get('empleados/{id}/edit','empleadosController@edit');
Route::post('empleados/update/{id}','empleadosController@update');
Route::post('empleados/delete/{id}','empleadosController@delete');


