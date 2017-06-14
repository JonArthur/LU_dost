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


Auth::routes();
Route::resource('guard','GuardController');


Route::get('visitor', ['middleware' => [ 'auth:admin'], function() {
  return view('visitor.index');
}]);
Route::get('visitor', ['middleware' => ['auth'], function() {
  return view('visitor.index');
}]);
Route::get('/visitor/comment',['as'=>'visitor.comment','uses'=>'VisitorController@showComment']);
Route::resource('visitor','VisitorController');

Route::get('/users/logout','Auth\LoginController@userLogout')->name('user.logout');

Route::get('/',function()
{
  return view('welcome');
});
Route::get('/home', 'HomeController@index')->name('home');
Route::get('/admin', 'AdminController@index')->name('admin.dashboard');
Route::get('/admin/login','Auth\AdminLoginController@showLoginForm')->name('admin.login');
Route::post('/admin/login','Auth\AdminLoginController@login')->name('admin.login.submit');
Route::get('/admin/logout','Auth\AdminLoginController@logout')->name('admin.logout');
