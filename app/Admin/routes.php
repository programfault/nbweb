<?php

use Illuminate\Routing\Router;
use Illuminate\Support\Facades\Route;
use Dcat\Admin\Admin;
use \App\Admin\Controllers;

Admin::routes();

Route::group([
    'prefix'     => config('admin.route.prefix'),
    'namespace'  => config('admin.route.namespace'),
    'middleware' => config('admin.route.middleware'),
], function (Router $router) {

    $router->get('/', 'HomeController@index');
    $router->resource('/posts', 'NbPostController');
//    $router->resource('/passwords', 'PasswordController');
//    $router->resource('/websites', 'WebsiteController');
//    $router->resource('/domains', 'DomainController');
//    $router->resource('/servers', 'ServerController');
//    $router->resource('/domainnames', 'DomainNameController');
//    $router->resource('/status', 'StatusController');
//    $router->get('/api/domains', 'ResourceController@domains');
//    $router->get('/api/websites', 'ResourceController@websites');
//    $router->get('/api/status', 'ResourceController@status');
});
