<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Course extends Model
{

    protected $fillable = [
        'name', 'description', 'img',
    ];

    public function students()
    {
        return $this->belongsToMany(Student::class);
    }

    public static function coursesList()
    {

        if (session('courses')) {
            return $courses = session('courses');
        } else {
            Return static::latest()->get();
        }
    }

}
