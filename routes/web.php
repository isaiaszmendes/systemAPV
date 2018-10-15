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


Route::group(['prefix' => 'ajuda'], function()
{
    Route::get('/', 'UserController@ajuda')->name('ajuda');

    Route::get('/mesas', 'UserController@ajuda')->name('mesas');

    Route::post('/solicitando', 'UserController@solicitar')->name('ajuda.solicitar');

}); 

Route::group(['prefix' => 'atendente'], function()
{
    Route::get('/mesas-disponíveis', 'UserController@necessitandoAjuda')->name('mesas.necessitandoAjuda');

    Route::get('/mesas-atendimento', 'UserController@mesasEmAtendimento')->name('mesas.mesasEmAtendimento');

    Route::get('/meus-atendimentos', 'UserController@meuAtendimento')->name('mesas.meuAtendimento');

    Route::get('/mesa-sem-cliente', 'UserController@semCliente')->name('mesas.semCliente');

    Route::post('/mesa-atender', 'UserController@atenderMesa')->name('mesas.atender');


}); 

Route::get('/pendencia', 'UserController@pendencia')->name('ajuda.pendencia');

