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

Route::group(['prefix' => 'users',  'middleware' => 'Owner'], function()
{
    Route::get('1', function($id = 1) {
        $user = User::find($id);
        return view('users.show')->with('user', $user);
    } );

    Route::get('1/edit', function($id = 1) {
        $user = User::find($id);
        return view('users.edit')->with('user', $user);
    } );

});

Route::resource('students', "StudentsController");
Route::resource('courses', "CoursesController");
Route::resource('users', "UsersController");
Route::get('/theschool', 'HomeController@index');

Auth::routes();
