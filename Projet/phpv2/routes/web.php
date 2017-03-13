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

Route::get('/hello', 'HomeController@toto');

    Route::get('/home', 'HomeController@index');
    Route::get('/exercises/resolve','ExerciseController@begin');
    Route::post('/exercises/resolve','ExerciseController@resolve');

/* Route for Creat exercises */
Route::get('/exercises/getCreate', 'ExerciseController@getCreate');
Route::post('/exercises/postCreate','ExerciseController@postCreate');


/* Route for User Profile */
Route::get('/profile', 'UserController@profile');
Route::post('/profile', 'UserController@update_avatar');

Route::get('/logout'); /* todo */
