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
$router->post('/', ['middleware' => 'auth', function () {

}]);
$router->group(['prefix' => 'v1', 'middleware' => 'auth'], function () use ($router) {
    $router->post('/rating','RatingController@rating');
});
//$router->get('/test_endpoint', function (Request $request) {
//})->middleware('client');
