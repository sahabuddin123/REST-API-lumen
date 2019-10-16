<?php

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


$router->group(
    [
        'prefix' => 'api/v1',
    ],
    function () use ($router) {
    $router->get('/', 'ExampleController@index');

    //router controller

    $router->post('/users', 'UsersController@create');
    $router->get('/users', 'UsersController@index');
});






// $router->get('/', function () use ($router) {
//     //return $router->app->version();
//     return response()->json([
//         'success' => true,
//         'massege' => 'Welcome TO Lumen REST API'
//     ]);
// });
