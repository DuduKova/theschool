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


Route::get('/', 'StudentsController@index');

Route::get('/users', function () {

    $users = User::all();

    return view('users.index')->with('users', $users);
});


Route::get('/users/{user}', function ($id) {

    $user = User::find($id);

    return view('users.show')->with('user', $user);
});

//course list

Route::get('/courses', 'CoursesController@index');

//course show

Route::get('/courses/{course}', 'CoursesController@show');

//course create

Route::get('/create', 'StudentsController@create');

//students list

Route::get('/students', 'StudentsController@index');

//student show

Route::get('/students/{student}', 'StudentsController@show');

//student create

//Route::get('/create', 'StudentsController@create');

//student save after create.

Route::post('/', 'StudentsController@store');



