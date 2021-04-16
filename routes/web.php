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
$router->post('tao-phong','PhongController@tao_phong');
$router->post('sua-phong','PhongController@sua_phong');
$router->post('dong-phong','PhongController@dong_phong');
$router->post('sua-giaphong','PhongController@sua_giaphong');
