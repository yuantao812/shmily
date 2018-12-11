<?php

use Illuminate\Routing\Router;

Admin::registerAuthRoutes();

Route::group([
    'prefix' => config('admin.route.prefix'),
    'namespace' => config('admin.route.namespace'),
    'middleware' => config('admin.route.middleware'),
], function (Router $router) {

    $router->get('/', 'HomeController@index');
    $router->resource('contracts', ContractController::class);
    $router->resource('customers', CustomerController::class);
    $router->resource('address', AddressController::class);
    $router->resource('payments', PaymentController::class);
    $router->resource('contacts', ContactController::class);

});
