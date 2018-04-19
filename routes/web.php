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
Route::get('/post-categories/{id}', 'ShowController@showCategories');
Route::get('/detail-post/{id}', 'ShowController@showPost');
Route::get('/', 'ShowController@index');
Route::resource('/cat','CatController');
Route::resource('/post','PostsController');
Route::resource('/comment','CommentsController');
Route::resource('/user','UsersControlller');
Route::get('/admin', 'HomeController@index');
Route::get('/search', 'ShowController@search');
Auth::routes();
