<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

$router->group(['prefix' => 'api'], function () use ($router) {
    $router->get('/', function () use ($router) {
        return "API is working.";
    });
    // Users
    $router->get('/users/', 'UserController@index');
    $router->post('/register/', 'UserController@register');

    $router->put('/users/{user_id}', 'UserController@update');
    $router->delete('/users/{user_id}', 'UserController@destroy');




    $router->group(['middleware' => 'auth'], function () use ($router) {
        $router->get('/users', 'UserController@show');
    });
});

