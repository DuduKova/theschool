@extends('layouts.master')

@section('container')

    <h1>Edit Course</h1>

    {!! Form::open(['action' => 'CoursesController@update', 'method' => 'POST']) !!}
    <div class="form-group">
        {{Form::label('name', 'Name')}}
        {{Form::text('name', $course->name, ['class' => 'form-control', 'placeholder' => 'Enter your name'] )}}
    </div>
    <div class="form-group">
        {{Form::label('description', 'Description')}}
        {{Form::textarea('description', $course->description, ['id'=> 'article-ckeditor','class' => 'form-control', 'placeholder' => 'Enter your course'] )}}
    </div>
    <div class="form-group">
        {{Form::label('img', 'IMG')}}
        {{Form::text('img', $course->img, ['class' => 'form-control', 'placeholder' => 'Enter your role'] )}}
    </div>
    {{Form::submit('Submit', ['class' => 'btn btn-primary'])}}

    {!! Form::close() !!}

    @include('layouts.errors')

@endsection
