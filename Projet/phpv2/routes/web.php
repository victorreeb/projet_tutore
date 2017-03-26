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
Route::get('/exercises/{id}', 'ExerciseController@show')->name('exercise.show');

/* Route for Groupe */
Route::get('/groupes','GroupeController@index')->name('groupe.index');
Route::get('/groupes/{id}', 'GroupeController@show')->name('groupe.show');

/* Route for UserGroup */
Route::get('/groupes/{id}/signup', 'UserGroupeController@signup')->name('user.groupe.signup');
Route::get('/groupes/{id}/signout', 'UserGroupeController@signout')->name('user.groupe.signout');

/* Route for User Profile */
Route::get('/profile', 'UserController@profile')->name('profile');
Route::post('/profile', 'UserController@update_avatar');
Route::get('/profile/exercises/create', 'UserExerciseController@create')->name('exercise.create');
Route::post('/profile/exercises/create','UserExerciseController@store');
Route::get('/profile/exercises', 'UserExerciseController@index')->name('profile.exercise.index');
Route::get('/profile/groupes/create', 'UserGroupeController@create')->name('groupe.create');
Route::post('/profile/groupes/create','UserGroupeController@store');
Route::get('/profile/groupes', 'UserGroupeController@index')->name('profile.groupe.index');
Route::get('/profile/exercises/{id}/tests', 'TestController@create')->name('test.create');
Route::post('/profile/exercises/{id}/tests','TestController@store');
