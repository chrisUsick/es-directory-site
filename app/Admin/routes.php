<?php

use Illuminate\Routing\Router;

Admin::registerAuthRoutes();

Route::group([
    'prefix'        => config('admin.route.prefix'),
    'namespace'     => config('admin.route.namespace'),
    'middleware'    => config('admin.route.middleware'),
], function (Router $router) {

    $router->get('/', 'HomeController@index');


    $router->resource('/cities', CityController::class);
    $router->get('/api/cities', 'CityController@cities');
    $router->resource('/companies', CompanyController::class);
    $router->get('/api/companies', 'CompanyController@companies');
    $router->resource('/rooms', RoomController::class);
});

