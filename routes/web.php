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

$router->get('kost', 'RegistersController@index');
$router->get('kost/{kost_id}', 'KostsController@show');
$router->post('kost/create', 'KostsController@add_kost');
$router->put('kost/update/{kost_id}', 'KostsController@update');
$router->delete('kost/delete/{kost_id}', 'KostsController@delete');
$router->get('apartemen', 'ApartemensController@index');
$router->get('apartemen/{apartemen_id}', 'ApartemensController@show');
$router->post('apartemen/create', 'ApartemensController@add_apartemen');
$router->put('apartemen/update/{apartemen_id}', 'ApartemensController@update');
$router->delete('apartemen/delete/{apartemen_id}', 'ApartemensController@delete');

$router->get('chat/{chat_id}', 'ChatsController@show');
$router->post('chat/create', 'ChatsController@add_chat');

