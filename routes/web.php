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

Route::get('/usuarios', 'HomeController@index')->name('home');

Route::group(['prefix' => 'usuario'], function(){

    Route::get('/', 'UserController@index')->name('user.listar');

});   
