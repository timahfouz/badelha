<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::group(['namespace' => 'API\V1', 'prefix' => 'v1'], function() {
    
    Route::post('auth/login', ['as' => 'login', 'uses' => 'AuthController@login']);
    Route::post('auth/register', ['as' => 'register', 'uses' => 'AuthController@register']);

    Route::group(['middleware' => 'auth:api'], function() {
        
        Route::get('auth/profile', ['as' => 'profile', 'uses' => 'UserController']);
        Route::get('categories', ['as' => 'categories', 'uses' => 'CategoryController']);
        Route::get('products', ['as' => 'products', 'uses' => 'ProductController']);
        Route::post('carts', ['as' => 'cart.store', 'uses' => 'CartController']);
        Route::post('checkout', ['as' => 'order.checkout', 'uses' => 'OrderController']);
    
    });

});
