<?php

/*
|--------------------------------------------------------------------------
|  Routes para users admins
|--------------------------------------------------------------------------
*/

Route::get('/', function () {
    return view('welcome');
});

/*
|--------------------------------------------------------------------------
|  Rotas de Autenticação
|--------------------------------------------------------------------------
*/

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/home/{id}/update', 'HomeController@update')->name('chamado-update');

/*
|--------------------------------------------------------------------------
|  UserController
|--------------------------------------------------------------------------
*/

Route::get('/usuarios', 'UserController@index')->name('users');

Route::group(['prefix' => 'usuario'], function()
{
    Route::post('/', 'UserController@create')->name('user.create');

    Route::put('/{id}', 'UserController@update')->name('user.update');

    Route::delete('/{id}', 'UserController@destroy')->name('user.destroy');

    Route::any('/search' , 'UserController@search')->name('user.search');

});   

/*
|--------------------------------------------------------------------------
|  RoleController
|--------------------------------------------------------------------------
*/

Route::get('/roles', 'RoleController@index')->name('roles');

Route::group(['prefix' => 'role'], function()
{

    Route::get('/{id}/permissions', 'RoleController@permissions')->name('role.permissions');

});   

/*
|--------------------------------------------------------------------------
|  RoleController
|--------------------------------------------------------------------------
*/

Route::get('/permissions', 'PermissionController@index')->name('permissions');

Route::group(['prefix' => 'permission'], function()
{
    Route::get('/{id}/roles', 'PermissionController@roles')->name('permission.roles');

}); 

