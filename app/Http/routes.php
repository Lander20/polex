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
        Route::resource('/proyecto', 'ProyectoController');
        Route::resource('/user', 'UsuarioController');
        Route::resource('/material', 'MaterialController');
        Route::resource('/seccion', 'SeccionController');
        Route::resource('/perfil', 'PerfilController');

        Route::get('/', 'HomeController@index');

        Route::get('user/habilitar/{id}', ['as' => 'user.habilitar', 'uses' => 'UsuarioController@habilitar']);


        Route::post('proyecto/{idProyecto}/plano/create', ['as' => 'plano.create', 'uses' => 'PlanoController@create']);
        Route::get('proyecto/{idProyecto}/plano/{idPlano}', ['as' => 'plano.show', 'uses' => 'PlanoController@show']);
        Route::get('proyecto/{idProyecto}/plano/{idPlano}/delete', ['as' => 'plano.destroy', 'uses' => 'PlanoController@destroy']);
        Route::get('proyecto/{idProyecto}/plano/{idPlano}/presupuesto', ['as' => 'plano.presupuesto', 'uses' => 'PlanoController@presupuesto']);
        Route::get('proyecto/{idProyecto}/plano/{idPlano}/{cubicacion}/selected', ['as' => 'cubicacion.selected', 'uses' => 'CubicacionController@selected']);

        Route::get('proyecto/{idProyecto}/plano/{idPlano}/cubicacion/create', ['as' => 'cubicacion.create', 'uses' => 'CubicacionController@create']);
        Route::get('proyecto/{idProyecto}/plano/{idPlano}/cubicacion/{infoCubicacion}/show', ['as' => 'cubicacion.show', 'uses' => 'CubicacionController@show']);
        Route::post('proyecto/{idProyecto}/plano/{idPlano}/cubicacion/{infoCubicacion}/guardar', ['as' => 'cubicacion.guardar', 'uses' => 'CubicacionController@guardar']);
        Route::post('proyecto/{idProyecto}/plano/{idPlano}/cubicacion/{infoCubicacion}/eliminar', ['as' => 'cubicacion.eliminar', 'uses' => 'CubicacionController@eliminar']);
        Route::post('proyecto/{idProyecto}/plano/{idPlano}/cubicacion/{infoCubicacion}/reset', ['as' => 'cubicacion.reset', 'uses' => 'CubicacionController@reset']);
        Route::get('proyecto/{idProyecto}/plano/{idPlano}/cubicacion/{infoCubicacion}/detalle', ['as' => 'cubicacion.detalle', 'uses' => 'CubicacionController@detalle']);

        Route::get('/material/{id}/delete',["as"=>"material.delete", "uses"=>"MaterialController@delete"]);
        Route::get('/user/{id}/delete',["as"=>"user.delete", "uses"=>"UsuarioController@destroy"]);


        Route::post('proyecto/{idProyecto}/plano/{idPlano}/upload',['as'=>'plano.upload','uses' => 'PlanoController@uploadImagePlano']);



        /*---------------------------------------*/

        Route::get('user/{id}/proyectos', ['as' => 'user.proyectos', 'uses' => 'UsuarioController@proyectos']);
        Route::get('perfil/{id}/users', ['as' => 'user.proyectos', 'uses' => 'PerfilController@users']);

    });


});