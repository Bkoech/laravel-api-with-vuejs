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
Route::group([ 'middleware' => 'api'], function () {

    Route::post('login', 'App\Http\Controllers\Api\AuthController@login')->name('login');
    Route::post('checkToken', 'App\Http\Controllers\Api\AuthController@checkToken');
    Route::post('logout', 'App\Http\Controllers\Api\AuthController@logout');
    Route::get('admin', 'App\Http\Controllers\Api\AdminController@index');


});
