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


    Route::group(['middleware' => ['json.response']], function () {



        // public routes
        Route::post('/login', 'API\AuthController@login')->name('login.api');
        Route::post('/register', 'API\AuthController@register')->name('register.api');

        // private routes
        Route::middleware('auth:api')->group(function () {
            Route::get('/logout', 'API\AuthController@logout')->name('logout.api');
            Route::middleware('auth:api')->get('/user', function (Request $request) {
                return $request->user();
            });

            Route::get('product', 'API\ProductController@index')->name('api.product.list');
            Route::get('product/{productId}', 'API\ProductController@show')->name('api.product.show');
            Route::post('product/create', 'API\ProductController@store')->name('api.product.create');
            Route::post('product/{productId}/update', 'API\ProductController@update')->name('api.product.update');
            Route::delete('product/{productId}', 'API\ProductController@destroy')->name('api.product.delete');

        });

    });
