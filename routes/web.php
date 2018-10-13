<?php

/*
|--------------------------------------------------------------------------
|  Routes para users admins
|--------------------------------------------------------------------------


*/

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/usuarios', 'UserController@usuarios')->name('users');

Route::group(['prefix' => 'usuario'], function()
{
    Route::post('/', 'UserController@create')->name('user.create');

    Route::put('/{id}', 'UserController@update')->name('user.update');

    Route::delete('/{id}', 'UserController@destroy')->name('user.destroy');

    Route::post('/search' , 'UserController@search')->name('user.search');

});   
