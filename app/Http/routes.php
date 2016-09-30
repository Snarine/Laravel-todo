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

Route::get('/', [
  'as' => 'posts', 'uses' => 'PostController@index'
]);
Route::get('unpublished', ['as' => 'posts.unpublished', 'uses' => 'PostController@unpublished']);

//Route::get('post/create', ['as' => 'post.create', 'uses' => 'PostController@create']);
//Route::post('post', ['as' => 'post.store',  'uses' => 'PostController@store']);
//Route::get('post/{post}',      ['as' => 'post.show',   'uses' => 'PostController@show']);
//Route::get('post/{post}/edit', ['as' => 'post.edit',   'uses' => 'PostController@edit']);
//Route::post('post/{post}',     ['as' => 'post.update', 'uses' => 'PostController@update']);
$router->resource('post', 'PostController');



Route::get('todo', [
  'as' => 'todo', 'uses' => 'TodoController@index'
])->middleware('auth');

Route::get('/todo/login', [
        'as' => 'user-login',
        'uses' => 'AuthController@getLogin'
])->middleware('guest');
 
Route::post('/todo/login', [
    'uses' => 'AuthController@postLogin'
]);

Route::post('/todo', [     
        'uses'  => 'TodoController@postIndex'
]);

Route::get('/todo/new', [
    'as' => 'new-task', 'uses' => 'TodoController@getNew'
]);
 
Route::post('/todo/new', [
    'uses' => 'TodoController@postNew'
]);


Route::bind('App\Models\item', function($value, $route){
    return Item::where('id', $value)->first();
});

Route::get('/todo/delete/{item}', [
    'as' => 'delete-task', 'uses' => 'TodoController@getDelete'
]);