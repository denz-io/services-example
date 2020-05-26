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
    return response()->json([
        'Service' => 'Example Api', 
        'Status'  => 'Setup is fine'
    ]);
});

$router->get('user[/{user}]', 'User@get');
$router->get('user/delete/{user}', 'User@delete');
$router->post('user/create', 'User@create');
$router->post('user/update', 'User@udpate');
