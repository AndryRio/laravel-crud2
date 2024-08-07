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

Route::get('/home', [
    'as'=> 'home',
    'uses' => 'HomeController@index',
]);

Route::get('/contacts', 'ContactController@index')->name('contacts.index');

Route::get('/contacts/show/{id}', 'ContactController@show')->name('contacts.show');

Route::get('/contacts/export', 'ContactController@export')->name('contacts.export');

Route::get('/contacts/star', 'ContactController@star')->name('contacts.star');

//Route::group(['middleware' => $user->HasRole('admin')], function (){
    Route::prefix('contacts')->middleware('auth')->group(function () {
        Route::name('contacts.')->group(function () {
            Route::get('/create', [
                'as' => 'create',
                'uses' => 'ContactController@create',
            ]);
            Route::post('/store', [
                'as' => 'store',
                'uses' => 'ContactController@store',
            ]);
            Route::delete('/destroy/{id}', [
                'as' => 'destroy',
                'uses' => 'ContactController@destroy',
            ]);
            Route::get('/edit/{id}', [
                'as' => 'edit',
                'uses' => 'ContactController@edit',
            ]);
            Route::put('/update/{id}', [
                'as' => 'update',
                'uses' => 'ContactController@update',
            ]);
        });
    });
//});

Route::get('/testadmin', 'Admin\UserController@addAdminRoleToUser')->name('admin');

Route::get('/testuser', 'Admin\UserController@addUserRoleToUser')->name('user');

Route::get('/testupgrade', 'Admin\UserController@upgradeUserToAdminRole')->name('upgrade');

Route::get('/testdelete', 'Admin\UserController@deleteRoleToUser')->name('delete');

/*Route::get('something-you-cant-do', function (\Illuminate\Http\Request $request) {
   abort(403, 'You dont have access to this page!');
});*/




