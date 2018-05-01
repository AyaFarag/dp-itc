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
    return view('auth.login');
});

Auth::routes();

Route::resource('/home', 'postController');

Route::get('/home', 'postController@index')->name('home');

// add post route
Route::post('/post', 'postController@store');

// update post
Route::post('/update/post' , 'postController@update');
