<?php

// use Illuminate\Routing\Route;
// use Illuminate\Routing\
/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

// Route::get('/', 'WelcomeController@index');
// Route::get('home', 'HomeController@index');

Route::get('/', 'FrontController@index');

//单一文章展示页
Route::get('pages/{id}', 'PagesController@show');

// Route::controllers([
// 	'auth' => 'Auth\AuthController',
// 	'password' => 'Auth\PasswordController',
// ]);

Route::get('auth/login', 'Auth\AuthController@getLogin');
Route::post('auth/login', 'Auth\AuthController@postLogin');
Route::get('auth/logout', 'Auth\AuthController@getLogout');

Route::group(['prefix' => 'admin', 'namespace' => 'Admin','middleware'=>'auth'], function(){
    Route::get('/', 'AdminHomeController@index');
    Route::get('admin/pages','PagesController@store');//新增条目
    Route::resource('pages', 'PagesController');
});
Route::get('{type_id}','FrontController@index');






