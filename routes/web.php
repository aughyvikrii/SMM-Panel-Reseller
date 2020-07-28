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
        Route::get('login','AuthController@authview');
        Route::post('login','AuthController@loginProcess');

        Route::get('register','AuthController@authview');
    });
    Route::get('forgot-password','AuthController@authview');
});

Route::group(['middleware' => 'isLogin:true'],function(){
    // Route::get('mustloggedin',function(){
    //     dd("AWA");
    // });
    Route::get('/{any}', function () {
        return view('app');
    })->where('any','.*');
});
