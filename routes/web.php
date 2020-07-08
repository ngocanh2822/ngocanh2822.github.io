<?php

use Illuminate\Support\Facades\Route;

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

	Route::get('home',['uses'=>'Pagecontroller@getIndex'])->name('index');
	Route::get('/',['uses'=>'Pagecontroller@getIndex'])->name('index');
	Route::get('lien-he',['uses'=>'Pagecontroller@getLienhe']);
	Route::get('lien-he',['uses'=>'Pagecontroller@getLienhe']);
	Route::get('login',['uses'=>'Pagecontroller@getLogin'])->name('login');
	Route::post('login',['uses'=>'Pagecontroller@postLogin'])->name('post_login');
Route::group(['middleware'=>'user'],function () {



Route::get('dich-vu',['uses'=>'Pagecontroller@getDichvu'])->name('dichvu');



	Route::get('dich-vu',['uses'=>'Pagecontroller@getDichvu']);
	

	

	Route::get('tai-khoan',['uses'=>'Pagecontroller@getTaikhoan']);
	Route::post('tai-khoan',['uses'=>'Pagecontroller@postTaikhoan'])->name('post_taikhoan');

	Route::get('user-payment',['uses'=>'Pagecontroller@getuserpayment']);

	Route::get('fb-buy-sell',['uses'=>'Pagecontroller@fbbuysell']);
	Route::post('fb-buy-sell',['uses'=>'Pagecontroller@postfbbuysell'])->name('post_fbbuysell');

	Route::get('fb-rip-nick',['uses'=>'Pagecontroller@fbripnick']);
	Route::post('fb-rip-nick',['uses'=>'Pagecontroller@postfbripnick'])->name('post_fbripnick');

	Route::get('fb-rename',['uses'=>'Pagecontroller@fbrename']);
	Route::post('fb-rename',['uses'=>'Pagecontroller@postfbrename'])->name('post_fbrename');

	Route::get('fb-security',['uses'=>'Pagecontroller@fbsecurity']);
	Route::post('fb-security',['uses'=>'Pagecontroller@postfbsecurity'])->name('post_fbsecurity');

	Route::get('fb-like-post',['uses'=>'Pagecontroller@fblikepost']);
	Route::post('fb-like-post',['uses'=>'Pagecontroller@postfblikepost'])->name('post_fblikepost');

	Route::get('fb-follow',['uses'=>'Pagecontroller@fbsub']);
	Route::post('fb-follow',['uses'=>'Pagecontroller@postfbsub'])->name('post_fbsub');

	Route::get('fb-fan-page',['uses'=>'Pagecontroller@fbfanpage']);
	Route::post('fb-fan-page',['uses'=>'Pagecontroller@postfbfanpage'])->name('post_fbfanpage');

	Route::get('fb-cmt-post',['uses'=>'Pagecontroller@fbcmt']);
	Route::post('fb-cmt-post',['uses'=>'Pagecontroller@postfbcmt'])->name('post_fbcmt');

	Route::get('fb-share-post',['uses'=>'Pagecontroller@fbshare']);
	Route::post('fb-share-post',['uses'=>'Pagecontroller@postfbshare'])->name('post_fbshare');

	Route::get('insta-like',['uses'=>'Pagecontroller@instalike']);
	Route::post('insta-like',['uses'=>'Pagecontroller@postinstalike'])->name('post_instalike');

	Route::get('insta-follow',['uses'=>'Pagecontroller@instafl']);
	Route::post('insta-follow',['uses'=>'Pagecontroller@postinstafl'])->name('post_instafl');

	Route::get('insta-comment',['uses'=>'Pagecontroller@instacmt']);
	Route::post('insta-comment',['uses'=>'Pagecontroller@postinstacmt'])->name('post_instacmt');

	Route::get('vip-like-month',['uses'=>'Pagecontroller@viplikemonth']);
	Route::post('vip-like-month',['uses'=>'Pagecontroller@postviplikemonth'])->name('post_viplikemonth');

	Route::get('vip-like-mount',['uses'=>'Pagecontroller@viplikemount']);
	Route::post('vip-like-mount',['uses'=>'Pagecontroller@postviplikemount'])->name('post_viplikemount');
});
// admin
Route::post('checklogin',['uses'=>'LoginController@checklogin'])->name('checklogin');
Route::group(['prefix'=>'admin','middleware'=>'admin'],function () {
	Route::resource('thanhtoan','DonhangController');
    Route::get('index', ['uses'=>'AdminController@index'])->name('ad_index');
    Route::get('logout',['uses'=>'LoginController@logout'])->name('ad_logout');
});