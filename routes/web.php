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
$router->post('mo-phong','PhongController@mo_phong');
$router->post('sua-giaphong','PhongController@sua_giaphong');
$router->post('tao-khach','KhachtroController@tao_khach');
$router->post('sua-khach','KhachtroController@sua_khach');
$router->post('xoa-khach','KhachtroController@xoa_khach');
$router->post('tao-hopdong','HopdongController@tao_hopdong');
$router->post('xoa-hopdong','HopdongController@xoa_hopdong');
$router->post('ghi-dien','HopdongController@ghi_dien');
$router->post('tao-phieuthu','HopdongController@tao_phieuthu');
$router->post('thanh-toan','HopdongController@thanh_toan');
$router->post('themnguoi-HD','HopdongController@themnguoi_HD');
$router->post('xoanguoi-HD','HopdongController@xoanguoi_HD');
$router->post('wifi','HopdongController@wifi');
$router->post('them-xe','XeController@them_xe');
$router->post('xoa-xe','XeController@xoa_xe');
$router->post('sua-giadv','DichvuController@sua_giadv');
$router->post('xoa-hopdong','HopdongController@xoa_hopdong');
$router->post('ketthuc-hopdong','HopdongController@xoa_hopdong');


