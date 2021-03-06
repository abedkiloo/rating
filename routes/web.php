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
$router->post('/register','UsersController@register');
$router->post('/login','UsersController@login');
//$router->post('/rating','RatingController@rating')->middleware('auth');
$router->group(['prefix' => 'v1', 'middleware' => 'auth'], function () use ($router) {
    $router->post('/rating','RatingController@index');
    $router->get('/users','UsersController@users');
    $router->get('/user/{id}','UsersController@user');
    $router->get('/ratings','RatingController@rating');
    $router->get('/rating/{id}','RatingController@user_rating');
});
//$router->get('/test_endpoint', function (Request $request) {
//})->middleware('client');
