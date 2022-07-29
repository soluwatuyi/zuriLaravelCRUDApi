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

Route::get('/user/create', 'App\Http\Controllers\UserController@register');
Route::get('/user/login', 'App\Http\Controllers\UserController@login');
Route::get('/user/update/{id}', 'App\Http\Controllers\UserController@update');
Route::get('/user/delete/{id}', 'App\Http\Controllers\UserController@delete');
Route::get('/user/{id}', 'App\Http\Controllers\UserController@getUser');
Route::get('/users', 'App\Http\Controllers\UserController@getUsers');
