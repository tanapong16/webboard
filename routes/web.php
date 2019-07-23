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

//-------------------------Route For Category------------------------------------
Route::get('/category', 'CategoryController@index')->name('category.index');//แสดงPostที่อยู่ในCategory
Route::get('/category/create', 'CategoryController@create')->name('category.create');//แสดงหน้าเพิ่มCategory
Route::post('/category/store', 'CategoryController@store')->name('category.store');//สคลิปเพิ่มข้อมูลCategory
Route::get('/category/{category}/edit', 'CategoryController@edit')->name('category.edit')->where('category', '[0-9]+');
Route::post('/category/{category}', 'CategoryController@update')->name('category.update')->where('category', '[0-9]+');
Route::delete('/category/{category}', 'CategoryController@destroy')->name('category.destroy')->where('category', '[0-9]+');
Route::get('/category/show/{category}', 'CategoryController@show')->name('category.show')->where('category', '[0-9]+');
//-------------------------Route For Post----------------------------------------
Route::get('/', 'PostController@index')->name('post.index');//หน้าหลักแสดงทั้งPost และ Category
Route::get('/post/create/{category}/{user}', 'PostController@create')->name('post.create');//แสดงหน้าเพิ่มPost โดยการยิง id ของ Category ไป
Route::post('/poststore', 'PostController@store')->name('post.store');//สคลิปเพิ่มข้อมูลPost
Route::get('/post/show/{post}/{category}', 'PostController@show')->name('post.show');//แสดงหน้าข้อมูลของPost Cat และ Comment แล้วมีฟรอมเพิ่ม Comment
Route::get('/post/list/{category}', 'PostController@list')->name('post.list');
//-------------------------Route For Comment-------------------------------------
Route::post('/comment/store', 'CommentController@store')->name('comment.store');//สคลิปเพิ่ม Comment
Route::get('/comment/show/{comment}', 'CommentController@show')->name('comment.show');//แสดงหน้าที่ User ไป Comment ทั้งหมด
//-------------------------Route For User----------------------------------------
Route::get('/user/index/{user}', 'EditUserController@index')->name('user.index');//หน้าแสดงข้อมูลของUser
Route::get('/user/edit/{user}', 'EditUserController@edit')->name('user.edit');//หน้าแก้ไข Password
Route::get('/user/editEmail/{user}', 'EditUserController@editEmail')->name('user.editEmail');//หน้าแก้ไข Email
Route::post('/user/{user}', 'EditUserController@update')->name('user.update');//สคลิปแก้ไข Password
Route::post('/userEmail/{user}', 'EditUserController@updateEmail')->name('user.updateEmail');//สคลิปแก้ไข Email
Route::get('/user/show/{user}', 'EditUserController@show')->name('user.show');
Route::get('/comment/{user}', 'EditUserController@comment')->name('user.comment');




Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');


Route::prefix('admin')->group(function(){
Route::get('/login', 'Auth\AdminLoginController@showLoginForm')->name('admin.login');
Route::post('/login', 'Auth\AdminLoginController@login')->name('admin.login.submit');
Route::get('/adminIndex', 'AdminController@index')->name('admin.dashboard');
	});
