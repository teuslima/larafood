<?php

/**
 * To Login
 */

Route::post('/sanctum/token', 'Api\Auth\AuthClientController@auth');

Route::group([
    'middleware' => ['auth:sanctum']
], function(){
    Route::get('auth/me', 'Api\Auth\AuthClientController@me');
    Route::post('auth/logout', 'Api\Auth\AuthClientController@logout');

});

/**
 * Criar Versionamento de API
 */
Route::group([
    'prefix' => 'v1',
    'namespace' => 'Api'
], function(){
    Route::get('/tenants/{uuid}', 'TenantApiController@show');
    Route::get('/tenants', 'Api\TenantApiController@index');
    
    Route::get('/categories/{url}', 'CategoryApiController@show');
    Route::get('/categories', 'Api\CategoryApiController@categoriesByTenant');
    
    Route::get('/tables/{identify}', 'TableApiController@show');
    Route::get('/tables', 'TableApiController@tablesByTenant');
    
    Route::get('/products/{identify}', 'ProductApiController@show');
    
    Route::get('/products/{flag}', 'ProductApiController@show');
    Route::get('/products', 'ProductApiController@productByTenant');

    Route::post('/clients', 'Auth\RegisterController@store');
});
