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

//登录
Route::post('/adminapi/login','AdminUserController@login');
//后台
Route::group(['middleware' => 'UserAuth','prefix' => 'adminapi'], function () {
    //users控制器
    Route::group(['prefix' => 'user'], function () {
        Route::post('/loginOut','AdminUserController@loginOut');
        Route::post('/changePwd','AdminUserController@changePwd');
        Route::post('/menu','AdminUserController@menu');
    });

    //商品控制器
    Route::resource('/item','ItemController');

    //单页控制器
    Route::resource('/page','PageController');

    //图片上传入口
    Route::group(['prefix' => 'uploadapi'], function () {
        //产品图上传
        Route::post('/itemImg','UploaderController@itemImg');
        //文档图上传
        Route::post('/itemContent','UploaderController@itemContent');
    });
});
