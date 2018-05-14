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
Route::get('/csrf',function(){
    echo csrf_token();
});

//前台
Route::get('/','Index\IndexController@index');
Route::get('/page/{id?}','Index\IndexController@page');
Route::get('/product','Index\IndexController@product');
Route::get('/product/{id?}','Index\IndexController@productDetail');

//前台登录
Route::get('/login','Index\IndexController@login');
//test
Route::get('/product_detail','Index\IndexController@product_detail');

//前台登录后界面
//Route::group(['middleware' => 'UserAuth','prefix' => 'user'], function () {
//
//});


//后台登录
Route::post('/adminapi/login','Admin\AdminUserController@login');
//后台管理
Route::group(['middleware' => 'UserAuth','prefix' => 'adminapi'], function () {
    //users控制器
    Route::group(['prefix' => 'user'], function () {
        Route::post('/loginOut','Admin\AdminUserController@loginOut');
        Route::post('/changePwd','Admin\AdminUserController@changePwd');
        Route::post('/menu','Admin\AdminUserController@menu');
    });

    //商品分类控制器
    Route::resource('/itemClass','Admin\ItemClassController');

    //商品控制器
    Route::resource('/item','Admin\ItemController');

    //单页控制器
    Route::resource('/page','Admin\PageController');

    //图片上传入口
    Route::group(['prefix' => 'uploadapi'], function () {
        //产品图上传
        Route::post('/itemImg','Admin\UploaderController@itemImg');
        //文档图上传
        Route::post('/itemContent','Admin\UploaderController@itemContent');
    });
});
