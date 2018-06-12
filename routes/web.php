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

//前台 不需要auth的路由
Route::get('/abc','Index\IndexController@aaa');

Route::get('/csrf',function(){
    echo csrf_token();
});
//------------------------------------前台
//前台 不需要auth的路由
Route::get('/','Index\IndexController@index');
//单页
Route::get('/page/{id?}','Index\IndexController@page');
//产品
Route::get('/product/{list?}','Index\IndexController@product');
Route::get('/product/{list}/{id}','Index\IndexController@productDetail');

//前台登录
Route::get('/login','Index\IndexUserController@login');
//前台注册
Route::get('/register','Index\IndexUserController@register');

//前台接口路由
Route::group(['prefix' => 'indexapi'], function () {
    //登录
    Route::post('/login','Index\IndexUserController@loginDo');
    //注册
    Route::post('/regist','Index\IndexUserController@registerDo');
    //申请图上传
    Route::post('/applyUpload','UploaderController@apply');
    //短信接口
    Route::any('/sms','Index\IndexUserController@sendSms');

    //需要auth的接口路由
    Route::group(['middleware' => 'UserAuth'], function () {
        //登出
        Route::post('/loginOut','Index\IndexUserController@loginOut');
        //提交申请
        Route::post('/userApply','Index\IndexUserController@userApplyDo');
    });
});
//前台需要auth的路由 不是接口
Route::group(['middleware' => 'UserAuth'], function () {
    Route::get('/userCenter','Index\IndexUserController@userCenter');
    Route::get('/userApply','Index\IndexUserController@userApply');
});

//--------------------------------后台

//后台登录
Route::post('/adminapi/login','Admin\AdminUserController@login');
//后台管理
Route::group(['middleware' => 'AdminAuth','prefix' => 'adminapi'], function () {
    //users控制器
    Route::group(['prefix' => 'user'], function () {
        Route::post('/loginOut','Admin\AdminUserController@loginOut');
        Route::post('/changePwd','Admin\AdminUserController@changePwd');
        Route::any('/menu','Admin\AdminUserController@menu');
    });

    //商品分类控制器
    Route::resource('/itemClass','Admin\ItemClassController');

    //商品控制器
    Route::resource('/item','Admin\ItemController');

    //单页控制器
    Route::resource('/page','Admin\PageController');

    //审核控制器
    Route::resource('/apply','Admin\ApplyController');

    //前台用户控制器
    Route::resource('/indexUser','Admin\IndexUserController');

    //图片上传入口
    Route::group(['prefix' => 'uploadapi'], function () {
        //产品图上传
        Route::post('/itemImg','UploaderController@itemImg');
        //文档图上传
        Route::post('/itemContent','UploaderController@itemContent');
    });
});
