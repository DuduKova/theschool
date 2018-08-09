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

        Return static::latest()->get();

    }
}
