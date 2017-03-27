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

/* default route */
Route::get('/', 'HomeController@index');

/* Route for Auth */
Auth::routes();
Route::get('/logout', 'Auth\LoginController@logout');

/* Route for Exercise */
Route::get('/exercises/{id}/resolve','ExerciseController@begin')->name('exercise.resolve');
Route::post('/exercises/{id}/resolve','ExerciseController@resolve');
Route::get('/exercises','ExerciseController@index')->name('exercise.index');
Route::get('/exercises/create', 'ExerciseController@create')->name('exercise.create');
Route::post('/exercises/create','ExerciseController@store');
Route::get('/exercises/{id}', 'ExerciseController@show')->name('exercise.show');
Route::get('/exercises/{id}/tests', 'TestController@create')->name('test.create');
Route::post('/exercises/{id}/tests','TestController@store');

/* Route for Groupe */
Route::get('/groupes','GroupeController@index')->name('groupe.index');
Route::get('/groupes/create', 'GroupeController@create')->name('groupe.create');
Route::post('/groupes/create','GroupeController@store');
Route::get('/groupes/{id}', 'GroupeController@show')->name('groupe.show');

/* Route for UserGroup */
Route::get('/groupes/{id}/signup', 'UserGroupeController@signup')->name('user.groupe.signup');
Route::get('/groupes/{id}/signout', 'UserGroupeController@signout')->name('user.groupe.signout');

/* Route for User Profile */
Route::get('/profile', 'UserController@profile')->name('profile');
Route::post('/profile', 'UserController@update_avatar');
