<?php

/** @var \Laravel\Lumen\Routing\Router $router */

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It is a breeze. Simply tell Lumen the URIs it should respond to
| and give it the Closure to call when that URI is requested.
|
*/

$router->get('/', function () use ($router) {
    return $router->app->version();
});

$router->group(['prefix' => 'api', 'middleware' => ['jwt.verify', 'authorize']], function () use ($router) {
    $router->get('roles', ['as' => 'role.read', 'uses' => 'RoleController@index']);
    $router->post('roles', ['as' => 'role.create', 'uses' => 'RoleController@store']);
    $router->get('roles/{role_id}', ['as' => 'role.detail', 'uses' => 'RoleController@show']);
    $router->put('roles/{role_id}', ['as' => 'role.update', 'uses' => 'RoleController@update']);
    $router->delete('roles/{role_id}', ['as' => 'role.delete', 'uses' => 'RoleController@destroy']);

    $router->get('menus', ['as' => 'menu.read', 'uses' => 'MenuController@index']);
    $router->post('menus', ['as' => 'menu.create', 'uses' => 'MenuController@store']);
    $router->get('menus/{menu_id}', ['as' => 'menu.detail', 'uses' => 'MenuController@show']);
    $router->put('menus/{menu_id}', ['as' => 'menu.update', 'uses' => 'MenuController@update']);
    $router->delete('menus/{menu_id}', ['as' => 'menu.delete', 'uses' => 'MenuController@destroy']);

    $router->get('actions', ['as' => 'action.read', 'uses' => 'ActionController@index']);
    $router->post('actions', ['as' => 'action.create', 'uses' => 'ActionController@store']);
    $router->get('actions/{action_id}', ['as' => 'action.detail', 'uses' => 'ActionController@show']);
    $router->put('actions/{action_id}', ['as' => 'action.update', 'uses' => 'ActionController@update']);
    $router->delete('actions/{action_id}', ['as' => 'action.delete', 'uses' => 'ActionController@destroy']);

    $router->get('accesses', ['as' => 'access.read', 'uses' => 'AccessController@index']);
    $router->post('accesses', ['as' => 'access.create', 'uses' => 'AccessController@store']);
    $router->get('accesses/{access_id}', ['as' => 'access.detail', 'uses' => 'AccessController@show']);
    $router->put('accesses/{access_id}', ['as' => 'access.update', 'uses' => 'AccessController@update']);
    $router->delete('accesses/{access_id}', ['as' => 'access.delete', 'uses' => 'AccessController@destroy']);
});

$router->post('authorize', ['as' => 'auth.check', 'uses' => 'AuthController@index']);
