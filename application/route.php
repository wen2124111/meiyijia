<?php
// +----------------------------------------------------------------------
// | ThinkPHP [ WE CAN DO IT JUST THINK ]
// +----------------------------------------------------------------------
// | Copyright (c) 2006~2016 http://thinkphp.cn All rights reserved.
// +----------------------------------------------------------------------
// | Licensed ( http://www.apache.org/licenses/LICENSE-2.0 )
// +----------------------------------------------------------------------
// | Author: liu21st <liu21st@gmail.com>
// +----------------------------------------------------------------------
use think\Route;
//api.tp.cc/ ====> api.tp.cc/index.php/api/index/index 
//域名路由
Route::domain('api', 'api');
//api.tp.cc/user/2 ====> api.tp.cc/index.php/api/user/index/id/2 
//控制器名称要与数据库相符
//user    用户操作 ====================================================================================
//登陆用户
Route::post('user/login', 'user/login');
//注册用户
Route::post('user/signup', 'user/signup');
//用户修改密码
Route::post('user/change_pwd', 'user/change_pwd');
//用户找回密码
Route::post('user/find_pwd', 'user/find_pwd');

//用户收货地址列表
Route::get('address/', 'user/address_list');
//添加用户收货地址
Route::post('address/', 'user/address_create');
//用户收货地址详情
Route::get('addres/', 'user/address_details');
//用户收货地址修改
Route::put('address/', 'user/address_update');
//用户收货地址删除
Route::delete('address/', 'user/address_delete');
//======================================================================================================

//home    操作 ====================================================================================
//获取轮播列表
Route::get('basearticle/carousel', 'basearticle/carousel');
//获取专题列表
Route::get('basearticle/title', 'basearticle/title');
//======================================================================================================

//goods  商品操作 ====================================================================================
//获取分类列表
Route::get('goods_category/', 'goods_category/list');
//获取商品列表
Route::get('goods/', 'goods/list');
//获取商品详情
Route::get('goods/details', 'goods/details');
//======================================================================================================

//collect  收藏商品 ====================================================================================
//收藏商品
Route::post('collect', 'collect/create');
//收藏列表
Route::get('collects', 'collect/list');
//取消收藏
Route::delete('collect/', 'collect/delete');
//======================================================================================================


//cart  购物车操作 ====================================================================================
//加入购物车
Route::post('cart', 'v1.Cart/cart_create');
//购物车列表
Route::get('cart/:time/:token/:user_id/[:num]/[:page]', 'v1.Cart/cart_list');
//购物车加减
Route::put('cart/', 'v1.Cart/cart_update');
//购物车删除
Route::delete('cart/:time/:token/:user_id/:cart_id', 'V1.Cart/cart_delete');

//======================================================================================================


//order  订单操作 ====================================================================================
//创建订单
Route::post('order', 'order/create');
//订单列表
Route::get('orders', 'order/list');
//订单详情
Route::get('order', 'order/details');
//订单删除
Route::delete('order', 'order/delete');
//订单修改
Route::put('order', 'order/update');

//确认收货
Route::put('order/receipt', 'order/receipt');
//取消订单
Route::put('order/cancel', 'order/cancel');
//======================================================================================================







//查
Route::get('code/:time/:token/:username/:is_exist', 'code/get_code');
//删除操作
Route::delete('code/:time/:token/:username/:is_exist', 'code/delete_code');



// return [
//     '__pattern__' => [
//         'name' => '\w+',
//     ],
//     '[hello]'     => [
//         ':id'   => ['index/hello', ['method' => 'get'], ['id' => '\d+']],
//         ':name' => ['index/hello', ['method' => 'post']],
//     ],

// ];
