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

$router->get('kirim-email','MailController@index');
$router->get('profile/{user_id}', 'RegistersController@index');
$router->put('profile/update/{user_id}', 'RegistersController@update');
$router->post('authentication/register', 'RegistersController@register');
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

$router->get('lowongan', 'LowongansController@index');
$router->get('lowongan/{lowongan_id}', 'LowongansController@show');
$router->post('lowongan/create', 'LowongansController@add_lowongan');
$router->put('lowongan/update/{lowongan_id}', 'LowongansController@update');
$router->delete('lowongan/delete/{lowongan_id}', 'LowongansController@delete');

$router->get('payment', 'PaymentsController@index');
$router->get('payment/{pembayaran_id}', 'PaymentsController@show');
$router->post('payment/create', 'PaymentsController@add_payment');
$router->put('payment/update/{pembayaran_id}', 'PaymentsController@update');
$router->delete('payment/delete/{pembayaran_id}', 'PaymentsController@delete');

$router->get('chat/{chat_id}', 'ChatsController@show');
$router->post('chat/create', 'ChatsController@add_chat');

$router->group(['prefix' => 'auth'], function () use ($router) {

    $router->post('/login', 'AuthController@login');
});

$router->post('/upload', 'UploadController@index');
