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

Route::get('/', 'HomeController@index' );

Route::resource('/projects', 'ProjectsController');  // Laravel preset routes

Route::post('/projects/{project}/tasks', 'ProjectTasksController@store');  // Add new task
Route::post('completed-tasks/{task}', 'CompletedTasksController@store');  // Mark a task as completed
Route::delete('completed-tasks/{task}', 'CompletedTasksController@destroy');  // Mark a task as not completed

Auth::routes();

Route::get('/home', 'HomeController@index');

Route::get('/user', 'Auth\UserController@index');

Route::patch('/user/{user}', 'Auth\UserController@update');

