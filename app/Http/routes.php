<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

/*Route::get('/', function () {
    return redirect("/login");
});*/

Route::auth();

Route::group(['middleware' => 'auth'], function () {

    Route::group(['middleware' => 'status'], function () {
        Route::get('/', 'HomeController@index');

        Route::get('user/habilitar/{id}', ['as' => 'user.habilitar', 'uses' => 'UsuarioController@habilitar']);
        Route::resource('/user', 'UsuarioController');

        Route::get('perfil/habilitar/{id}', ['as' => 'perfil.habilitar', 'uses' => 'PerfilController@habilitar']);
        Route::resource('/perfil', 'PerfilController');

        Route::get('proyecto/{idProyecto}/plano/{idPlano}', ['as' => 'plano.show', 'uses' => 'PlanoController@show']);
        Route::get('proyecto/{idProyecto}/plano/{idPlano}/{cubicacion}/selected', ['as' => 'cubicacion.selected', 'uses' => 'CubicacionController@selected']);
        Route::get('proyecto/{idProyecto}/plano/{idPlano}/cubicacion/create', ['as' => 'cubicacion.create', 'uses' => 'CubicacionController@create']);
        Route::resource('/proyecto', 'ProyectoController');

        Route::post('proyecto/{idProyecto}/plano/{idPlano}/upload',['as'=>'plano.upload','uses' => 'PlanoController@uploadImagePlano']);
    });


});