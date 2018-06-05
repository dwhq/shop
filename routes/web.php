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
        Route::any('list', 'usersController@list');
    });
    //文件上传
    Route::post('upload', 'uploadController@upload');
    //商品管理
    Route::prefix('goods')->group(function () {
        Route::any('list', 'goodsController@list');
        //商家列表
        Route::any('daili', 'goodsController@dailiList');
        //添加商家
        Route::any('add_daili', 'goodsController@add_daili');
        //更改商家状态
        Route::post('show_daili', 'goodsController@show_daili');
        //分类页面
        Route::get('category', 'goodsController@category');
        //添加分类页面
        Route::get('add_category_page/{parent_id}', 'goodsController@add_category_page')->where('parent_id','[0-9]+');
        //添加分类提交
        Route::post('add_category', 'goodsController@add_category');
        //修改分类页面
        Route::get('alter_category_page/{id}', 'goodsController@alter_category_page')->where('id','[0-9]+');
        //修改分类提交
        Route::post('alter_category', 'goodsController@alter_category');
    });
});