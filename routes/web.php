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

Route::get('nota/create', 'NotaController@create')->name('nota.create')->middleware('language');
Route::get('nota/{nota}', 'NotaController@show')->name('nota.show')->middleware('language');
Route::get('nota', 'NotaController@index')->name('nota.index')->middleware('language');
Route::post('nota', 'NotaController@store')->name('nota.store')->middleware('language');
Route::get('nota/{nota}/edit', 'NotaController@edit')->name('nota.edit')->middleware('language');
Route::post('nota/comentario','NotaController@comentarioGuardar')->name('comentario.guardar');
Route::put('nota/{nota}', 'NotaController@update')->name('nota.update')->middleware('language');
Route::delete('nota/{nota}', 'NotaController@destroy')->name('nota.destroy')->middleware('language');
//Route::resource('nota', 'NotaController');

Route::resource('/user','UserController');
Route::resource('/reporte','ReporteController');
Route::get('/pdfusers', 'PDFController@PDFUsers')->name('descargarPDFUsers');
//Route::get('user','UserController@index')->name('user.index')->middleware('language');
Auth::routes();
//Route::get('user/{user}/edit', 'UserController@edit')->name('user.edit')->middleware('language');
Route::get('/home', 'HomeController@index')->name('home');
