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
//PagesController Routes
Route::group(['middlewareGroups' =>['web']],function(){
Route::get('/','PagesController@getIndex');
Route::get('about','PagesController@getAbout');
Route::get('contact','PagesController@getContact');
Route::post('contact','PagesController@postContact');


//PostController Routes
Route::resource('posts','PostController');
Route::get('blog',['uses' => 'BlogController@getIndex','as'=>'blog.index']);
Route::get('blog/{slug}',['as' => 'blog.single', 'uses' => 'BlogController@getSingle'])->where('slug','[\w\d\-\_]+');
});

//CategoryController Routes
Route::resource('categories','CategoryController');
Route::resource('tags','TagController');

//Comments
Route::post('comments/{post_id}',['uses' => 'CommentsController@store','as' => 'comments.store']);
Route::get('comments/{id}/edit',['uses' => 'CommentsController@edit','as' => 'comments.edit']);
Route::put('comments/{id}',['uses' => 'CommentsController@update','as' => 'comments.update']);
Route::get('comments/{id}/delete',['uses' => 'CommentsController@delete','as' => 'comments.delete']);
Route::delete('comments/{id}',['uses' => 'CommentsController@destroy','as' => 'comments.destroy']);



Route::auth();

Route::auth();

Route::get('/home', 'HomeController@index');

Route::auth();

Route::get('/home', 'HomeController@index');

Route::auth();

Route::get('/home', 'HomeController@index');
