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

$router->group(['prefix' => 'v1', 'namespace' => 'Api\v1'], function() use($router)
{

    $router->get('admin-coupons','AdminCouponController@index');
    $router->post('admin-coupons','AdminCouponController@store');
    $router->get('admin-coupons/{coupon}','AdminCouponController@show');
    $router->put('admin-coupons/{coupon}','AdminCouponController@update');
    $router->patch('admin-coupons/{coupon}','AdminCouponController@update');
    $router->delete('admin-coupons/{coupon}','AdminCouponController@destroy');
    $router->delete('admin-coupons/{coupon}','AdminCouponController@destroy');
});
