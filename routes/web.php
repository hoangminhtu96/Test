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
Route::get('test',function(){
	return view('font-end.emails.email-dathang');
});

Route::get('login-admin',['as'=>'getLoginAd','uses'=>'AdminController@getLogin'])->middleware('Admin');
Route::post('login-admin',['as'=>'postLoginAd','uses'=>'AdminController@postLogin']);

Route::get('/',['as'=>'trangchu','uses'=>'TrangChuController@getIndex']);
Route::get('loai-san-pham/{id}/{alias}',['as'=>'loaisanpham','uses'=>'TrangChuController@getLoaisanpham']);
Route::get('chi-tiet-san-pham/{id}/{alias}',['as'=>'chitietsanpham','uses'=>'TrangChuController@chitietsanpham']);
Route::get('lien-he',['as'=>'getlienhe','uses'=>'TrangChuController@getLienHe']);
Route::post('lien-he',['as'=>'postlienhe','uses'=>'TrangChuController@postLienHe']);

Route::get('mua-hang/{id}/{tensp}',['as'=>'muahang','uses'=>'TrangChuController@muahang']);
Route::get('gio-hang',['as'=>'giohang','uses'=>'TrangChuController@giohang']);
Route::get('xoa-sp/{id}',['as'=>'xoasp','uses'=>'TrangChuController@xoasp']);
Route::get('update/{id}/{qty}',['as'=>'update','uses'=>'TrangChuController@update']);

Route::get('thanh-toan',['as'=>'thanhtoan','uses'=>'TrangChuController@Thanhtoan']);
Route::post('thanh-toan',['as'=>'thanhtoan-Login','uses'=>'TrangChuController@postThanhtoan']);
Route::get('logout-thanh-toan',['as'=>'thanhtoan-Logout','uses'=>'TrangChuController@getLogout']);
Route::get('complete',['as'=>'complete','uses'=>'TrangChuController@complete']);

Route::get('login-all',['as'=>'getLogin','uses'=>'LoginController@getLogin']);
// Route::get('login',['as'=>'getLogin','uses'=>'LoginController@getLogin']);
Route::post('login-all',['as'=>'postLogin','uses'=>'LoginController@postLogin']);
Route::get('logout',['as'=>'getLogout','uses'=>'LoginController@getLogout']);
Route::get('register-member',['as'=>'getRegister','uses'=>'RegisterController@getR']);
Route::post('register-member',['as'=>'postRegister','uses'=>'RegisterController@postR']);

Route::middleware(['Admin'])->group(function () {
	Route::group(['prefix'=>'Admin'],function(){
		
		Route::group(['prefix'=>'cate'],function(){
			Route::get('list',['as'=>'Admin.cate.getList','uses'=>'CateController@getList']);
			Route::get('add',['as'=>'Admin.cate.getAdd','uses'=>'CateController@getAdd']);
			Route::post('add',['as'=>'Admin.cate.postAdd','uses'=>'CateController@postAdd']);

			Route::get('delete/{id}',['as'=>'Admin.cate.getDelete','uses'=>'CateController@getDelete']);
			Route::get('edit/{id}',['as'=>'Admin.cate.getEdit','uses'=>'CateController@getEdit']);
			Route::post('edit/{id}',['as'=>'Admin.cate.postEdit','uses'=>'CateController@postEdit']);
		});

		Route::group(['prefix'=>'product'],function(){
			Route::get('list',['as'=>'Admin.product.getList','uses'=>'ProductController@getList']);
			Route::get('add',['as'=>'Admin.product.getAdd','uses'=>'ProductController@getAdd']);
			Route::post('add',['as'=>'Admin.product.postAdd','uses'=>'ProductController@postAdd']);

			Route::get('delete/{id}',['as'=>'Admin.product.getDelete','uses'=>'ProductController@getDelete']);

			Route::get('edit/{id}',['as'=>'Admin.product.getEdit','uses'=>'ProductController@getEdit']);
			Route::post('edit/{id}',['as'=>'Admin.product.postEdit','uses'=>'ProductController@postEdit']);
			
			Route::get('delimg/{id}',['as'=>'Admin.product.delImg','uses'=>'ProductController@getDelImg']);
		});

		Route::group(['prefix'=>'user'],function(){
			Route::get('list',['as'=>'Admin.user.getList','uses'=>'UserController@getList']);

			Route::get('listAd',['as'=>'Admin.user.getListAd','uses'=>'UserController@getListAd']);

			Route::get('add',['as'=>'Admin.user.getAdd','uses'=>'UserController@getAdd']);
			Route::post('add',['as'=>'Admin.user.postAdd','uses'=>'UserController@postAdd']);

			Route::get('delete/{id}',['as'=>'Admin.user.getDelete','uses'=>'UserController@getDelete']);
			Route::get('deleteAd/{id}',['as'=>'Admin.user.getDeleteAd','uses'=>'UserController@getDeleteAd']);

			Route::get('edit/{id}',['as'=>'Admin.user.getEdit','uses'=>'UserController@getEdit']);
			Route::post('edit/{id}',['as'=>'Admin.user.postEdit','uses'=>'UserController@postEdit']);

			
			Route::get('editAd/{id}',['as'=>'Admin.user.getEditAd','uses'=>'UserController@getEditAd']);
			Route::post('editAd/{id}',['as'=>'Admin.user.postEditAd','uses'=>'UserController@postEditAd']);
			
			//Route::get('delimg/{id}',['as'=>'Admin.user.delImg','uses'=>'ProductController@getDelImg']);
		});
	});
});


Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
