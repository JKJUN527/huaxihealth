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
    return view('index');
});
/*关于页面*/
Route::get('/about', function () {
    return view('about.index');
});
Route::get('/about/team', function () {
    return view('about.team');
});
Route::get('/about/structure', function () {
    return view('about.structure');
});
Route::get('/about/datebook', function () {
    return view('about.datebook');
});
/* 新闻中心*/
Route::get('/news', function () {
    return view('news.index');
});
Route::get('/news/detail', function () {
    return view('news.detail');
});
Route::get('/news/notes', function () {
    return view('news.notes');
});
//科技研发
Route::get('/technology', function () {
    return view('technology.index');
});
Route::get('/technology/team', function () {
    return view('technology.team');
});
Route::get('/technology/team/detail', function () {
    return view('technology.teamDetail');
});
Route::get('/technology/achievements', function () {
    return view('technology.achievement');
});
Route::get('/technology/achievements/detail', function () {
    return view('technology.achievementDetail');
});
//产业服务
Route::get('/industry', function () {
    return view('industry.index');
});
Route::get('/industry/detail', function () {
    return view('industry.detail');
});
//合作交流
Route::get('/cooperation', function () {
    return view('cooperation.index');
});
Route::get('/cooperation/detail', function () {
    return view('cooperation.detail');
});
//联系我们
Route::get('/contact', function () {
    return view('contact.index');
});
Route::get('/contact/form', function () {
    return view('contact.form');
});


//网站后台
//Route::get('admin/login', function () {
//    return view('admin/login');
//});
Route::post('admin/login', ['uses' => 'Admin\LoginController@postLogin']);

Route::get('admin/', ['uses' => 'Admin\DashboardController@view']);
Route::get('admin/dashboard', ['uses' => 'Admin\DashboardController@view']);

Route::get('admin/admin', ['uses' => 'Admin\AdminController@view']);
//登陆注册
Route::post('admin/register', ['uses' => 'Admin\AdminController@addAdmin']);
Route::any('admin/delete', ['uses' => 'Admin\AdminController@deleteAdmin']);


Route::get('admin/index', ['uses' => 'Admin\LoginController@index']);
Route::get('admin/logout', ['uses' => 'Admin\LoginController@logout']);
Route::get('admin/getUid', ['uses' => 'Admin\AdminAuthController@getUid']);
Route::get('admin/getType', ['uses' => 'Admin\AdminAuthController@getType']);
//管理网站信息
Route::any('admin/about', ['uses' => 'Admin\WebinfoController@index']);//显示已发布广告信息
Route::any('admin/about/setPhone', ['uses' => 'Admin\WebinfoController@setPhone']);
Route::any('admin/about/setFax', ['uses' => 'Admin\WebinfoController@setFax']);
Route::any('admin/about/setCode', ['uses' => 'Admin\WebinfoController@setCode']);
Route::any('admin/about/setEmail', ['uses' => 'Admin\WebinfoController@setEmail']);
Route::any('admin/about/setAddress', ['uses' => 'Admin\WebinfoController@setAddress']);
Route::any('admin/about/setContent', ['uses' => 'Admin\WebinfoController@setContent']);
Route::any('admin/about/setadvantage', ['uses' => 'Admin\WebinfoController@setadvantage']);
//关于我们
Route::get('admin/about/team', ['uses' => 'Admin\AboutController@index']);//显示团队介绍
Route::post('admin/about/team/add', ['uses' => 'Admin\AboutController@teamAdd']);//新增团队介绍
Route::get('admin/about/team/delete', ['uses' => 'Admin\AboutController@teamDel']);//删除团队介绍
Route::get('admin/about/structure', ['uses' => 'Admin\AboutController@structureIndex']);//组织架构页面
Route::post('admin/about/structure/add', ['uses' => 'Admin\AboutController@structureAdd']);//上传组织架构图
Route::get('admin/about/datebook', ['uses' => 'Admin\AboutController@datebookIndex']);//大事记列表页面
Route::get('admin/about/addDatebook', ['uses' => 'Admin\AboutController@datebookAddIndex']);//大事记新增页面
Route::post('admin/about/datebook/add', ['uses' => 'Admin\AboutController@datebookAdd']);//大事记新增提交方法
Route::get('admin/about/datebook/detail', ['uses' => 'Admin\AboutController@datebookDetail']);//大事记详情返回
Route::get('admin/about/datebook/del', ['uses' => 'Admin\AboutController@datebookDel']);//大事记删除
Route::get('admin/about/development', ['uses' => 'Admin\AboutController@strategyIndex']);//发展战略页面
Route::get('admin/about/addStrategy',['uses' => 'Admin\AboutController@addStrategyIndex']);//编辑发展战略页面
Route::post('admin/about/development/add', ['uses' => 'Admin\AboutController@strategyAdd']);//发送数据发展战略页面

Route::any('admin/region', ['uses' => 'Admin\RegionController@index']);//显示产品分类
Route::any('admin/region/{option}', ['uses' => 'Admin\RegionController@edit'])->where('option', '[A-Za-z]+');//操作产品分类

Route::any('admin/products', ['uses' => 'Admin\RegionController@productView']);//显示产品列表
Route::any('admin/products/{option}', ['uses' => 'Admin\RegionController@productEdit'])->where('option', '[A-Za-z]+');//操作产品

//审批企业信息
Route::any('admin/enterprise/{option?}', ['uses' => 'Admin\VerificationController@index'])->where('option', '[0-2]{1}');//显示待审核或已审核的企业信息
Route::any('admin/enterprise/detail', ['uses' => 'Admin\VerificationController@showDetail']);//显示待审核或已审核的企业信息
Route::any('admin/enterprise/examine', ['uses' => 'Admin\VerificationController@passVerfi']);//显示待审核或已审核的企业信息



//发布广告
Route::get('admin/addAds', ['uses' => 'Admin\AdvertsController@addAdView']);//显示已发布广告信息

Route::any('admin/ads', ['uses' => 'Admin\AdvertsController@index']);//显示已发布广告信息
Route::any('admin/ads/detail', ['uses' => 'Admin\AdvertsController@detail']);//显示已发布广告信息
Route::any('admin/ads/add', ['uses' => 'Admin\AdvertsController@addAds']);//新增或修改广告信息
Route::any('admin/ads/find', ['uses' => 'Admin\AdvertsController@findAd']);//查找location位置是否有广告
Route::any('admin/ads/del', ['uses' => 'Admin\AdvertsController@delAd']);//删除广告

//发布新闻
Route::any('admin/news', ['uses' => 'Admin\EditnewsController@index']);//显示已发布新闻信息
Route::any('admin/news/detail', ['uses' => 'Admin\EditnewsController@detail']);//显示已发布新闻信息
Route::get('admin/addNews', ['uses' => 'Admin\EditnewsController@addNewsView']);//新增或修改新闻信息
Route::any('admin/news/add', ['uses' => 'Admin\EditnewsController@addNews']);//新增或修改新闻信息
Route::any('admin/news/del', ['uses' => 'Admin\EditnewsController@delNews']);

//管理企业发布职位
Route::any('admin/position', ['uses' => 'Admin\PositionController@index']);//显示已发布的职位信息
Route::any('admin/position/search', ['uses' => 'Admin\PositionController@findPosition']);//根据公司名字搜索对应发布的职位信息
Route::any('admin/position/urgency', ['uses' => 'Admin\PositionController@isUrgency']);//设置职位是否紧急状态
Route::any('admin/position/offposition', ['uses' => 'Admin\PositionController@OffPosition']);//下架职位信息


Route::any('admin/message', ['uses' => 'Admin\WebinfoController@message']);//显示留言信息
Route::get('admin/message/detail', ['uses' => 'Admin\WebinfoController@messageDetail']);//显示留言信息详情
Route::get('admin/message/del', ['uses' => 'Admin\WebinfoController@messageDel']);//删除留言信息详情