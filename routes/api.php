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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::post('/login','Api\AccountController@login');
Route::delete('/logout','Api\AccountController@logout')->middleware('auth:api');
Route::post('/register','Api\AccountController@register');
Route::get('/user','Api\AccountController@userInfo')->middleware('auth:api');
Route::put('/user/update/{id}','Api\AccountController@update')->middleware('auth:api');
Route::apiResource('product', 'Api\ProductController');
Route::apiResource('category', 'Api\CategoryController');
Route::apiResource('portfolio', 'Api\PortfolioController');
Route::apiResource('article', 'Api\ArticleController');
Route::apiResource('order', 'Api\OrderController');
Route::apiResource('order-detail', 'Api\OrderDetailController');
Route::apiResource('comment', 'Api\CommentController');

Route::get('show-product-by-category/{category}','Api\ProductController@show_pro_by_cate');
Route::get('show-product-by-portfolio/{portfolio}','Api\ProductController@show_pro_by_port');
