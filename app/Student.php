<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use phpDocumentor\Reflection\DocBlock\Tags\Return_;

class Student extends Model
{
    protected $fillable = [
        'name', 'email', 'phone', 'img',
    ];

    public function courses()
    {
        return $this->belongsToMany(Course::class);
    }

    public static function studentsList()
    {

        if (session('students')) {
            return $students = session('students');
        } else {
            Return static::latest()->get();
        }

    }
}
