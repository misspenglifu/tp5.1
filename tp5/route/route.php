<?php
// +----------------------------------------------------------------------
// | ThinkPHP [ WE CAN DO IT JUST THINK ]
// +----------------------------------------------------------------------
// | Copyright (c) 2006~2018 http://thinkphp.cn All rights reserved.
// +----------------------------------------------------------------------
// | Licensed ( http://www.apache.org/licenses/LICENSE-2.0 )
// +----------------------------------------------------------------------
// | Author: liu21st <liu21st@gmail.com>
// +----------------------------------------------------------------------

//use think\facade\Route;
//Route::get('think', function () {
//    return 'hello,ThinkPHP5!';
//});

//Route::get('hello/:name', 'index1/hello');
//Route::rule('hel','index1/index1/index1');

//Route::get('/', function () {
//    return 'Hello,world!';
//});
Route::rule('index', 'index/Index/index');
Route::rule('user/:id', 'index/User/read');
//Route::rule('/', 'index1/Index/index');
//Route::rule(':user/:id', 'index1/User/read');

/*
 * admin_routing
 * */
//后台首页
Route::rule('admin', 'admin/Index/index');
//登录页
Route::rule('login', 'admin/Login/login');

//退出
Route::rule('loginout', 'admin/Loginout/loginout');

//欢迎
Route::rule('welcome', 'admin/Welcome/welcome');

//会员
Route::rule('member_list', 'admin/Member/member_list');
Route::rule('member_del', 'admin/Member/member_del');
Route::rule('member_level', 'admin/Member/member_level');

//订单
Route::rule('order_list', 'admin/Order/order_list');

//分类
Route::rule('cate', 'admin/Cate/cate');


//城市联动
Route::rule('city', 'admin/City/city');


//管理员
Route::rule('admin_list', 'admin/Admin/admin_list');
Route::rule('admin_cate', 'admin/Admin/admin_cate');
Route::rule('admin_role', 'admin/Admin/admin_role');
Route::rule('admin_rule', 'admin/Admin/admin_rule');
Route::rule('admin_add', 'admin/Admin/admin_add');
Route::rule('admin_ruleadd', 'admin/Admin/admin_ruleadd');
Route::rule('admin_edit', 'admin/Admin/admin_edit');
Route::rule('admin_editdd', 'admin/Admin/admin_editdd');
Route::rule('admin_ruleedit', 'admin/Admin/admin_ruleedit');

//系统统计
Route::rule('echarts1', 'admin/Echarts/echarts1');
Route::rule('echarts2', 'admin/Echarts/echarts2');
Route::rule('echarts3', 'admin/Echarts/echarts3');
Route::rule('echarts4', 'admin/Echarts/echarts4');
Route::rule('echarts5', 'admin/Echarts/echarts5');
Route::rule('echarts6', 'admin/Echarts/echarts6');
Route::rule('echarts7', 'admin/Echarts/echarts7');
Route::rule('echarts8', 'admin/Echarts/echarts8');

//图标字体
Route::rule('unicode', 'admin/Unicode/unicode');

//表格设置
Route::rule('table', 'admin/Table/table');
Route::rule('table_add', 'admin/Table/table_add');
Route::rule('table_edit', 'admin/Table/table_edit');
Route::rule('table_add_listing', 'admin/Table/table_add_listing');
Route::rule('table_add_table', 'admin/Table/table_add_table');

//导航
Route::rule('menu', 'admin/Menu/menu');
Route::rule('menu_add', 'admin/Menu/menu_add');
Route::rule('menu_edit', 'admin/Menu/menu_edit');


//产品
Route::rule('product', 'admin/Product/product');
Route::rule('product_add', 'admin/Product/product_add');
Route::rule('product_edit', 'admin/Product/product_edit');
Route::rule('uplaod', 'admin/Product/uplaod');


/*
 * admin_routing
 * */






return [

];
