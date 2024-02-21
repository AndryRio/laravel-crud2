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

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/contacts', 'ContactController@index')->name('contacts.index');

Route::get('/contacts/create', 'ContactController@create')->name('contacts.create');

Route::post('/contacts/store', 'ContactController@store')->name('contacts.store');

Route::delete('/contacts/destroy', 'ContactController@destroy')->name('contacts.destroy');

Route::get('/contacts/show', 'ContactController@show')->name('contacts.show');

Route::get('/contacts/edit/{id}', 'ContactController@edit')->name('contacts.edit');

Route::get('/contacts/update', 'ContactController@update')->name('contacts.update');


