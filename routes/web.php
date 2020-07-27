<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::group(['middleware' => 'isLogin:false'],function(){
    Route::group(['prefix' => 'auth'],function(){
        Route::get('login','AuthController@login_view');
    });
});

Route::group(['middleware' => 'isLogin:true'],function(){
    Route::get('/{any}', function () {
        return view('app');
    })->where('any','.*');
});
