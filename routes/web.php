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

// Route::get('/', function () {
//     return view('welcome');
// });
//首页
Route::get('/','IndexController@index');

//    珠宝
Route::prefix('index')->group(function () {
    Route::get('index', 'IndexController@index');
    Route::get('reg', 'IndexController@reg');//注册
    Route::get('login', 'IndexController@login');//登录

    Route::get('shop', 'IndexController@shop');//排序
    Route::get('prolist', 'IndexController@prolist');//列表展示

    Route::get('car', 'IndexController@car');//购物车
    Route::get('cartDel', 'IndexController@cartDel');//购物车删除单条
    Route::get('proinfo', 'IndexController@proinfo');//单条数据显示
    Route::get('newprice', 'IndexController@newprice');//购买件数得到总价
    Route::get('shoucang', 'IndexController@shoucang');//收藏
    Route::get('add', 'IndexController@add');//加入购物车
    Route::get('changeBuyNmber', 'IndexController@changeBuyNmber');//加入购物车
    Route::get('getSubTotal', 'IndexController@getSubTotal');//获取小计
    Route::get('pay/{cart_id}', 'IndexController@pay');//支付页面
    Route::post('success', 'IndexController@success');//成功页面
     Route::get('pays','AliPayController@pay');
});
//我的
Route::prefix('user')->group(function () {
    Route::get('user', 'userController@user');//我的
    Route::get('order', 'userController@order');//待支付 代发货 待收货 全部订单
    Route::get('Aaaddress', 'userController@Aaaddress');//收货地址管理
    Route::get('address', 'userController@address');//详细地址
    Route::get('getcity', 'userController@getcity');//获取市县
    Route::get('addressdo', 'userController@addressdo');//添加地址处理页面
    Route::get('shoucang', 'userController@shoucang');//收藏
    Route::get('delshou', 'userController@delshou');//取消收藏
    Route::get('liu', 'userController@liu');//浏览记录
    Route::get('delliu', 'userController@delliu');//删除浏览记录
    Route::get('quanliu', 'userController@quanliu');//全部删除浏览记录
    Route::get('tui', 'userController@tui');//全部删除浏览记录
});

//    登录
Route::prefix('login')->group(function () {
    Route::get('reg', 'LoginController@reg');//注册
    Route::post('regdo', 'LoginController@regdo');//注册
    Route::get('login', 'LoginController@login');//登录
    Route::post('logindo', 'LoginController@logindo');//登录
    Route::post('checkEmail', 'LoginController@checkEmail');//验证邮箱唯一性
    Route::post('checkTel', 'LoginController@checkTel');//验证电话唯一性
    Route::get('test', 'LoginController@test');//
});


//登录注册
Route::prefix('deng')->group(function () {
    Route::get('zhu', 'DengController@zhu');//注册
    Route::post('zhudo', 'DengController@zhudo');//注册
    Route::get('login', 'DengController@login');//登录
    Route::post('logindo', 'DengController@logindo');//登录
    Route::post('checkEmail', 'DengController@checkEmail');//验证邮箱唯一性
    Route::get('ge', 'DengController@ge');//
});

//商品
Route::prefix('goods')->group(function () {
    Route::get('index', 'GoodsController@index');//列表展示
    Route::get('del', 'GoodsController@del');//删除
    Route::get('upd', 'GoodsController@upd');//修改
    Route::get('upddo', 'GoodsController@upddo');//修改执行
    Route::get('test', 'GoodsController@test');//修改执行
    Route::get('add', 'GoodsController@add');//添加
    Route::post('adddo', 'GoodsController@adddo');//添加执行
});
//同步
// Route::get('/successpay','UserController@successpay');
//异步
// Route::get('/notify','UserController@notify');