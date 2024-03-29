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


use Illuminate\Support\Facades\Route;

Auth::routes();

Route::group(['middleware' => 'auth'], function() {
    Route::get('/home', 'HomeController@index')->name('home');
    Route::resource('posts', 'PostsController');
    Route::resource('categories', 'CategoriesController');
    Route::resource('authors', 'AuthorController');
//    Route::resource('categories', 'CategoriesController');
//    Route::resource('categories', 'CategoriesController');
});
Route::get('events', 'EventController@index');
Route::post('events', 'EventController@post');
Route::get('author/{author}', 'PagesController@author')->name('author');
Route::get('/', 'PagesController@index');
Route::get('/search', 'SearchController@index')->name('search');
Route::get('/{category}', 'PagesController@category')->name('category');
Route::get('/{category}/{post}', 'PagesController@post')->name('post');
