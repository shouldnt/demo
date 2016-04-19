<?php

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

Route::get('/', function () {
    return view('welcome');
});

//Post route
Route::get('posts', 'PostsController@index')->name('posts');

Route::get('posts/{post}','PostsController@show')->name('post');

Route::post('posts', 'PostsController@store');

Route::get('posts/{post}/edit','PostsController@edit')->name('edit_post');

Route::patch('posts/{post}', 'PostsController@update');

Route::delete('posts/{post}', 'PostsController@delete');


// comments route
Route::post('posts/{post}/notes', 'CommentsController@store');

Route::get('comment/{comment}/edit', 'CommentsController@edit');

Route::patch('comment/{comment}', 'CommentsController@update'); 

Route::delete('comment/{comment}', 'CommentsController@delete');