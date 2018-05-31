<?php

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

Route::get('/', function () {
    return view('welcome');
});


//后台登陆
Route::prefix('/')->namespace('admin')->group(function () {
    Route::get('/h888.php', function () {
        return view('admin/login/login');
    });
    Route::post('login', 'LoginController@login');
});
//后台路由
Route::prefix('admin')->namespace('admin')->middleware('token')->group(function () {
    Route::get('index', 'IndexController@index');
    Route::get('index1', 'IndexController@index1');
    //会员管理
    Route::prefix('users')->group(function () {
        Route::get('list', 'usersController@list');
    });
});