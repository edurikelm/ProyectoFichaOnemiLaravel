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
    return view('auth.login');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

//Alumnos
Route::resource('/alumnos', 'AlumnoController');

Route::get('/alumnos/editar/{id}', 'AlumnoController@edit')->name('alumnos.editar');

Route::put('/alumnos/editar/{id}', 'AlumnoController@update')->name('alumnos.update');

Route::delete('/alumnos/eliminar/{id}', 'AlumnoController@destroy')->name('alumnos.eliminar');

//Fichas
Route::resource('/fichas', 'FichaController');

Route::get('/fichas/lista/{id}', 'FichaController@index')->name('fichas.lista');

Route::get('/fichas/editar/{id}', 'FichaController@edit')->name('fichas.editar');

Route::put('/fichas/editar/{id}', 'FichaController@update')->name('fichas.update');

// Route::get('/fichas/lista/{id}', 'FichaController@edit');

Route::delete('/fichas/eliminar/{id}', 'FichaController@destroy')->name('fichas.eliminar');

//PDF
Route::name('imprimir')->get('/imprimir-pdf/{id}', 'Controller@imprimirPdf');


