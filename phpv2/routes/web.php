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

Route::group(['middleware' => ['auth']], function () {
  /* Route for Auth */
  Route::get('/logout', 'Auth\LoginController@logout')->name('auth.logout');

  /* Route for Groupe */
  Route::get('/groupes', 'GroupeController@index')->name('groupe.index');
  Route::get('/groupes/{id}', 'GroupeController@show')->name('groupe.show');
  Route::get('/groupes/{id}/exercises', 'exercicesGroupesController@index')->name('groupe.exercise.index');

  /* Route for Exercise */
  Route::get('/exercises', 'ExerciseController@index')->name('exercise.index');
  Route::get('/exercises/{id}', 'ExerciseController@show')->name('exercise.show');
  Route::get('/exercises/{id}/resolve', 'ExerciseController@begin')->name('exercise.resolve');
  Route::post('/exercises/{id}/resolve', 'ExerciseController@resolve');

  /* Route for UserGroup */
  Route::get('/groupes/{id}/signup', 'UserGroupeController@signup')->name('user.groupe.signup');
  Route::get('/groupes/{id}/signout', 'UserGroupeController@signout')->name('user.groupe.signout');

  /* Route for User Profile */
  Route::get('/dashboard/profile', 'UserController@profile')->name('profile');
  Route::post('/dashboard/profile', 'UserController@update_avatar');
  Route::get('/dashboard/exercises/create', 'UserExerciseController@create')->name('exercise.create');
  Route::post('/dashboard/exercises/create', 'UserExerciseController@store');
  Route::get('/dashboard/exercises', 'UserExerciseController@index')->name('dashboard.exercise.index');
  Route::get('/dashboard/exercises/{id}/delete', 'UserExerciseController@delete')->name('dashboard.exercise.delete');
  Route::get('/dashboard/exercises/{id}/tests', 'TestController@create')->name('test.create');
  Route::post('/dashboard/exercises/{id}/tests', 'TestController@store');
  Route::get('/dashboard/groupes/create', 'UserGroupeController@create')->name('groupe.create');
  Route::post('/dashboard/groupes/create', 'UserGroupeController@store');
  Route::get('/dashboard/groupes', 'UserGroupeController@index')->name('dashboard.groupe.index');
  Route::get('/dashboard/groupe/{id}', 'UserGroupeController@show')->name('dashboard.groupe.show');
  Route::get('/dashboard/groupes/{id}/delete', 'UserGroupeController@delete')->name('dashboard.groupe.delete');
  Route::get('/dashboard/groupes/{id}/users/{user}/delete', 'UserGroupeController@delete_users')->name('dashboard.groupe.users.delete');
  Route::post('/dashboard/groupes/{id}/users/add', 'UserGroupeController@add_users')->name('dashboard.groupe.users.add');
  Route::post('/dashboard/groupes/{id}/exercises/add', 'ExercisesGroupeController@add_exercises')->name('groupe.exercise.add');
  Route::get('/dashboard/groupes/{id}/exercises/add', 'ExercisesGroupeController@show')->name('groupe.exercise.show');
  Route::get('/dashboard/groupes/{id}/exercises/{id_exercise}/delete', 'ExercisesGroupeController@delete')->name('dashboard.groupe.exercise.delete');
});
