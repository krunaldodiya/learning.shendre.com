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

Route::middleware('guest:api')->post('/otp/request', 'OtpController@requestOtp');
Route::middleware('guest:api')->post('/otp/verify', 'OtpController@verifyOtp');

Route::middleware('auth:api')->post('/upload/avatar', 'UserController@uploadAvatar');

Route::middleware('auth:api')->post('/categories/all', 'CategoryController@getCategories');

Route::middleware('auth:api')->post('/users/update', 'UserController@updateProfile');
Route::middleware('auth:api')->post('/users/me', 'UserController@me');

Route::middleware('auth:api')->post('/subscriptions/update', 'SubscriptionController@update');
