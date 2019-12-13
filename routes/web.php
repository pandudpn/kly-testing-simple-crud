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

// Route::get('/', function () {
//     return view('welcome');
// });
Route::get('/login', 'Auth\LoginController@index');
Route::post('/login', 'Auth\LoginController@doLogin');
Route::get('/login/logout', 'Auth\LoginController@logout');

Route::group(['middleware' => 'usersession'], function(){
    Route::get('/', 'HomeController@index');

    // staff
    Route::prefix('/account')->group(function(){
        Route::get('/', 'Master\AccountController@index');
        Route::match(['get', 'post'], '/new', 'Master\AccountController@create');
        Route::match(['get', 'put'], '/edit/{id}', 'Master\AccountController@edit');
        Route::delete('/delete/{id}', 'Master\AccountController@delete');
    });

    // role
    Route::prefix('/crud')->group(function(){
        Route::get('/', 'Master\CRUDController@index');
        Route::match(['get', 'post'], '/new', 'Master\CRUDController@create');
        Route::match(['get', 'put'], '/edit/{id}', 'Master\CRUDController@edit');
        Route::delete('/delete/{id}', 'Master\CRUDController@delete');
    });
});