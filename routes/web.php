<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;


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

Route::get('/', 'FoundController@index')->name('found');
Route::patch('/', 'FoundController@update')->name('updateFoundPost');
Route::delete('/', 'FoundController@destroy')->name('deleteFoundPost');

/* Route::resource('/', 'FoundController')->only([
    'update', 'destroy'
]); */

Route::get('/lost', 'LostController@index')->name('lost');
Route::get('/add-post', 'AddPostController@index')->name('addPost');
Route::post('/add-post', 'AddPostController@store')->name('storePost');
Route::get('/ajax', 'AjaxController@index')->name('ajax');
Route::get('/auction', 'AuctionController@index')->name('auction');

Route::get('/admin/due-posts', 'AdminDuePostsController@index')->name('duePosts');

Route::resource('/categories', 'AdminCategoriesController')->only([
    'index', 'store', 'update', 'destroy'
]);
Route::resource('/locations', 'AdminLocationsController')->only([
    'index', 'store', 'update', 'destroy'
]);
Route::resource('/users', 'AdminUsersController')->only([
    'index', 'update', 'destroy'
]);

/* Route::get('/admin/users', 'AdminUsersController@index')->name('users'); */

Auth::routes();