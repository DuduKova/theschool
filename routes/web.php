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

//Route::get('/users/1', 'UsersController@show')->middleware('Owner');
//Route::get('/users/1/edit', 'UsersController@edit')->middleware('Owner');

Route::resource('students', "StudentsController");
Route::resource('courses', "CoursesController");
Route::resource('users', "UsersController");
Route::get('/theschool', 'HomeController@index');

Auth::routes();