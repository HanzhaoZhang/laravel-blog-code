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

Route::get('/','BlogController@index')->name('blog.home');
Route::get('/blog/{slug}','BlogController@showPost')->name('blog.detail');

Route::get('/admin',function(){
    // return redirect('/admin/post');
    Route::resource('admin/post','PostController', ['except' => 'show']);
});

Route::middleware('auth')->namespace('Admin')->group(function(){
    Route::resource('admin/post','PostController');
    Route::resource('admin/tag', 'TagController',['except' => 'show']);
    Route::get('admin/upload','UploadController@index');

    Route::post('admin/upload/file','UploadController@uploadFile');
    Route::delete('admin/upload/file','UploadController@deleteFile');
    Route::post('admin/upload/folder','UploadController@createFolder');
    Route::delete('admin/upload/folder','UploadController@deleteFolder');
});

//退出登录
Route::get('/login','Auth\LoginController@showLoginForm')->name('login');
Route::get('/login','Auth\LoginController@login');
Route::get('/logout','Auth\LoginController@logout')->name('logout');

// Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

// Auth::routes();

// Route::get('/home', 'HomeController@index')->name('home');

// Auth::routes();

// Route::get('/home', 'HomeController@index')->name('home');

// Auth::routes();

// Route::get('/home', 'HomeController@index')->name('home');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('contact', 'ContactController@showForm');
Route::post('contact', 'ContactController@sendContactInfo');

//rss订阅
Route::get('rss','BlogController@rss');

// 添加新的路由
Route::get('sitemap.xml', 'BlogController@siteMap');



Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
