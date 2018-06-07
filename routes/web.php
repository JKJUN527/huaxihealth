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
Route::get('/', ['uses' => 'HomeController@index']);
Route::get('/index', ['uses' => 'HomeController@index']);
/*关于页面*/
Route::get('/about', ['uses' => 'AboutController@index']);
Route::get('/about/team', ['uses' => 'AboutController@team']);
Route::get('/about/structure', ['uses' => 'AboutController@structure']);
Route::get('/about/datebook', ['uses' => 'AboutController@datebook']);
Route::get('/about/datebook/detail', ['uses' => 'AboutController@datebookDetail']);
Route::get('/about/datebook/development', ['uses' => 'AboutController@development']);

/* 新闻中心*/
Route::get('/news', ['uses' => 'NewsController@index']);
Route::get('/news/detail', ['uses' => 'NewsController@detail']);
Route::get('/news/notes', ['uses' => 'NewsController@notes']);

//科技研发
Route::get('/technology', ['uses' => 'TechnologyController@index']);
Route::get('/technology/detail', ['uses' => 'TechnologyController@indexDetail']);
Route::get('/technology/team', ['uses' => 'TechnologyController@team']);
Route::get('/technology/team/detail', ['uses' => 'TechnologyController@teamDetail']);
Route::get('/technology/achievements', ['uses' => 'TechnologyController@achievements']);
Route::get('/technology/achievements/detail', ['uses' => 'TechnologyController@achievementsDetail']);

//产业服务
Route::get('/industry', ['uses' => 'IndustryController@index']);
Route::get('/industry/detail', ['uses' => 'IndustryController@indexDetail']);
Route::get('/industry/policy', ['uses' => 'IndustryController@policy']);
Route::get('/industry/policy/detail', ['uses' => 'IndustryController@policyDetail']);
Route::get('/industry/hatch', ['uses' => 'IndustryController@hatch']);
Route::get('/industry/hatch/detail', ['uses' => 'IndustryController@hatchDetail']);
Route::get('/industry/fund', ['uses' => 'IndustryController@fund']);
Route::get('/industry/fund/detail', ['uses' => 'IndustryController@fundDetail']);
//合作交流
Route::get('/cooperation', ['uses' => 'CooperationController@index']);
Route::get('/cooperation/detail', ['uses' => 'CooperationController@indexDetail']);
Route::get('/cooperation/out', ['uses' => 'CooperationController@out']);
Route::get('/cooperation/out/detail', ['uses' => 'CooperationController@outDetail']);
//联系我们
Route::get('/contact', ['uses' => 'ContactController@index']);
Route::get('/contact/detail', ['uses' => 'ContactController@indexDetail']);
Route::get('/contact/form', ['uses' => 'ContactController@form']);



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

//发布新闻
Route::get('admin/news', ['uses' => 'Admin\EditnewsController@index']);//显示已发布新闻信息
Route::get('admin/notes', ['uses' => 'Admin\EditnewsController@notesindex']);//显示已发布公告列表
Route::any('admin/news/detail', ['uses' => 'Admin\EditnewsController@detail']);//显示已发布新闻信息
Route::get('admin/addNews', ['uses' => 'Admin\EditnewsController@addNewsView']);//新增或修改新闻信息
Route::post('admin/news/add', ['uses' => 'Admin\EditnewsController@addNews']);//新增或修改新闻信息
Route::post('admin/notes/add', ['uses' => 'Admin\EditnewsController@addNotes']);//新增或修改公告
Route::any('admin/news/del', ['uses' => 'Admin\EditnewsController@delNews']);
Route::any('admin/notes/del', ['uses' => 'Admin\EditnewsController@delNotes']);
//专家委员会
Route::get('admin/technology', ['uses' => 'Admin\TechnologyController@index']);//显示专家委员会成员
Route::get('admin/technology/addExpert', ['uses' => 'Admin\TechnologyController@addExpertIndex']);//添加委员会界面
Route::post('admin/technology/addExpert', ['uses' => 'Admin\TechnologyController@addExpertPost']);//提交添加委员会界面
Route::get('admin/technology/del', ['uses' => 'Admin\TechnologyController@delExpert']);//删除委员
Route::get('admin/technology/team', ['uses' => 'Admin\TechnologyController@teamIndex']);//显示科研团队列表
Route::get('admin/technology/teamDetail', ['uses' => 'Admin\TechnologyController@teamDetail']);//显示科研团队列表
Route::get('admin/technology/teamDel', ['uses' => 'Admin\TechnologyController@teamDel']);//删除团队
Route::get('admin/technology/addTeam', ['uses' => 'Admin\TechnologyController@addteamIndex']);//添加界面
Route::post('admin/technology/addTeam', ['uses' => 'Admin\TechnologyController@addteamPost']);//提交添加
Route::get('admin/technology/achievements', ['uses' => 'Admin\TechnologyController@achievementsIndex']);//显示列表
Route::get('admin/technology/achievementsDetail', ['uses' => 'Admin\TechnologyController@achievementsDetail']);//显示详情
Route::get('admin/technology/achievementsDel', ['uses' => 'Admin\TechnologyController@achievementsDel']);//删除操作
Route::get('admin/technology/addAchievements', ['uses' => 'Admin\TechnologyController@addAchievementsIndex']);//添加界面
Route::post('admin/technology/addAchievements', ['uses' => 'Admin\TechnologyController@addachievementsPost']);//添加界面
//产业服务
Route::get('admin/industry', ['uses' => 'Admin\IndustryController@index']);//显示列表
Route::get('admin/industry/Detail', ['uses' => 'Admin\IndustryController@industryDetail']);//显示详情
Route::get('admin/industry/Del', ['uses' => 'Admin\IndustryController@industryDel']);//删除操作
Route::get('admin/industry/addIndustry', ['uses' => 'Admin\IndustryController@addIndustryIndex']);//添加界面
Route::post('admin/industry/addIndustry', ['uses' => 'Admin\IndustryController@addIndustryPost']);//添加界面
Route::get('admin/industry/policy', ['uses' => 'Admin\IndustryController@policyIndex']);//显示列表
Route::get('admin/industry/hatch', ['uses' => 'Admin\IndustryController@hatchIndex']);//显示列表
Route::get('admin/industry/fund', ['uses' => 'Admin\IndustryController@fundIndex']);//显示列表
//合作交流
Route::get('admin/cooperation', ['uses' => 'Admin\CooperationController@index']);//显示列表
Route::get('admin/cooperation/out', ['uses' => 'Admin\CooperationController@outIndex']);//显示列表
Route::get('admin/cooperation/Detail', ['uses' => 'Admin\CooperationController@cooperationDetail']);//显示详情
Route::get('admin/cooperation/Del', ['uses' => 'Admin\CooperationController@cooperationDel']);//删除操作
Route::get('admin/cooperation/addCooperation', ['uses' => 'Admin\CooperationController@addCooperationIndex']);//添加界面
Route::post('admin/cooperation/addCooperation', ['uses' => 'Admin\CooperationController@addCooperationPost']);//添加界面
//联系我们
Route::get('admin/contact', ['uses' => 'Admin\ContactController@index']);//显示列表
Route::get('admin/contact/form', ['uses' => 'Admin\ContactController@formIndex']);//显示列表
Route::get('admin/contact/Detail', ['uses' => 'Admin\ContactController@contactDetail']);//显示详情
Route::get('admin/contact/Del', ['uses' => 'Admin\ContactController@contactDel']);//删除操作
Route::get('admin/contact/addContact', ['uses' => 'Admin\ContactController@addContactIndex']);//添加界面
Route::post('admin/contact/addContact', ['uses' => 'Admin\ContactController@addContactPost']);//添加界面
Route::post('admin/contact/editContact', ['uses' => 'Admin\ContactController@editContactPost']);//添加界面