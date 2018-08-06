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



use App\User;

Route::resource('students', "StudentsController");
Route::resource('courses', "CoursesController");

Route::get('/', 'CoursesController@index');

Route::get('/users', function () {

    $users = User::all();

    return view('users.index')->with('users', $users);
});


Route::get('/users/{user}', function ($id) {

    $user = User::find($id);

    return view('users.show')->with('user', $user);
});

Auth::routes();