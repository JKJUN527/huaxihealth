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