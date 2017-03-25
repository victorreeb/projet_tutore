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

Auth::routes();

Route::get('/', 'HomeController@index');
Route::get('/exercises/{id}/resolve','ExerciseController@begin')->name('exercise.resolve');
Route::post('/exercises/{id}/resolve','ExerciseController@resolve');

/* Route for Creat exercises */
Route::get('/exercises','ExerciseController@index')->name('exercise.index');
Route::get('/exercises/create', 'ExerciseController@create')->name('exercise.create');
Route::post('/exercises/create','ExerciseController@store');
Route::get('/exercises/{id}', 'ExerciseController@show')->name('exercise.show');
Route::get('/exercises/{id}/tests', 'TestController@create')->name('test.create');
Route::post('/exercises/{id}/tests','TestController@store');


/* Route for add test for exercices */
Route::get('/exercises/create/test', 'testController@getCreate');
Route::post('/exercises/postCreate','testController@postCreate');


/* Route for User Profile */
Route::get('/profile', 'UserController@profile')->name('profile');
Route::post('/profile', 'UserController@update_avatar');

Route::get('/logout', 'Auth\LoginController@logout');
