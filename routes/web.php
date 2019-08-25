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

Route::resource('/alumnos', 'AlumnoController');

Route::get('/alumnos/editar/{id}', 'AlumnoController@edit')->name('alumnos.editar');

Route::put('/alumnos/editar/{id}', 'AlumnoController@update')->name('alumnos.update');

Route::delete('/alumnos/eliminar/{id}', 'AlumnoController@destroy')->name('alumnos.eliminar');

