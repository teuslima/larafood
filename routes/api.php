<?php

/**
 * To Login
 */
Route::post('/auth/register', 'Api\Auth\RegisterController@store');

Route::post('/auth/token', 'Api\Auth\AuthClientController@auth');

Route::group([
    'middleware' => ['auth:sanctum']
], function(){
    Route::get('auth/me', 'Api\Auth\AuthClientController@me');
    Route::post('auth/logout', 'Api\Auth\AuthClientController@logout');
    
    Route::post('auth/v1/orders/{identifyOrder}/evaluations', 'Api\EvaluationController@store');
   
    Route::get('auth/v1/my-orders', 'Api\OrderApiController@myOrders');
    Route::post('auth/v1/orders', 'Api\OrderApiController@store');
});

/**
 * Criar Versionamento de API
 */
Route::group([
    'prefix' => 'v1',
    'namespace' => 'Api'
], function(){
    Route::get('/tenants/{uuid}', 'TenantApiController@show');
    Route::get('/tenants', 'TenantApiController@index');
    
    Route::get('/categories/{identify}', 'CategoryApiController@show');
    Route::get('/categories', 'CategoryApiController@categoriesByTenant');
    
    Route::get('/tables/{identify}', 'TableApiController@show');
    Route::get('/tables', 'TableApiController@tablesByTenant');
    
    Route::get('/products/{identify}', 'ProductApiController@show');
    
    Route::get('/products/{identify}', 'ProductApiController@show');
    Route::get('/products', 'ProductApiController@productByTenant');


    Route::post('/orders', 'OrderApiController@store');
    Route::get('/orders/{identify}', 'OrderApiController@show');
});
