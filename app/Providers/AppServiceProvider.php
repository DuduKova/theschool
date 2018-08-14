<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use \Illuminate\Support\Facades\View;
use Illuminate\Contracts\View\Factory;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        view()->composer(['students.student_list','layouts.main_container'], function ($view) {
            $view->with('students', \App\Student::studentsList());
        });
        view()->composer(['students.create','students.edit','courses.course_list','layouts.main_container'], function ($view) {
            $view->with('courses', \App\Course::coursesList());
        });
        view()->composer('users.users_list', function ($view) {
            $view->with('users', \App\User::usersList());
        });

    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        if ($this->app->environment() !== 'production') {
            $this->app->register(\Barryvdh\LaravelIdeHelper\IdeHelperServiceProvider::class);
        }
    }
}
