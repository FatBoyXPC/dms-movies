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

Route::auth();

Route::get('/', 'HomeController@index');

Route::group(['prefix' => 'movies', 'middleware' => 'auth'], function() {
    Route::post('add', 'MoviesController@add');
    Route::get('search', 'MoviesController@search');
});

Route::group(['prefix' => 'lists', 'middleware' => 'auth'], function() {
    Route::get('/', 'ListsController@userLists');
    Route::get('add', 'ListsController@showAddList');
    Route::post('add', 'ListsController@processAddList');
    Route::post('add-movie', 'ListsController@addMovieToList');
});