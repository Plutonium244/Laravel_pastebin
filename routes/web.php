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
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('auth/google', 'Auth\GoogleController@redirectToGoogle');
Route::get('auth/google/callback', 'Auth\GoogleController@handleGoogleCallback');

Route::get('auth/github', 'Auth\GithubController@redirectToGithub');
Route::get('auth/github/callback', 'Auth\GithubController@handleGithubCallback');

Route::resource('posts', 'PostsController');

Route::get('/{id}/posts', ['uses' =>'PostsController@getPostsByAuthor']);

Route::get('/private', ['uses' =>'PostsController@getPostsByPassword'])->name('private');
