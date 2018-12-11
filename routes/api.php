<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/customers', function () {
    return \App\Customer::get(['id', 'company_name as text']);
});

Route::get('/admins', function () {
    return \Encore\Admin\Auth\Database\Administrator::all(['id', 'username as text']);
});
