@extends('layouts.master')

@section('container')

    <a href="/courses" class="btn btn-info">Go Back</a>

    <h1>{{$course->name}}</h1>

    <h1>{{$course->description}}</h1>

    <a href="/courses/{{$course->id}}/edit" class="btn btn-primary">Edit Course</a>

    <hr>

    <div class="list-group">
        @foreach($course->students as $student)
            <li class="list-group-item">
                {{$student->name}}
            </li>
        @endforeach
    </div>

    {!! Form::open(['action' => ['CoursesController@destroy', $course->id], 'method' => 'POST', 'class' => 'float-right']) !!}
    {{Form::hidden('_method', 'DELETE')}}
    {{Form::submit('Delete', ['class' => 'btn btn-danger'])}}

    {!! Form::close() !!}

@endsection