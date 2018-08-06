@extends('layouts.master')

@section('container')

    <h1>Create Course</h1>

    {!! Form::open(['action' => 'CoursesController@store', 'method' => 'POST']) !!}
    <div class="form-group">
        {{Form::label('name', 'Name')}}
        {{Form::text('name', '', ['class' => 'form-control', 'placeholder' => 'Enter your name'] )}}
    </div>
    <div class="form-group">
        {{Form::label('description', 'Description')}}
        {{Form::textarea('description', '', ['id'=> 'article-ckeditor','class' => 'form-control', 'placeholder' => 'Enter your course'] )}}
    </div>
    <div class="form-group">
        {{Form::label('img', 'IMG')}}
        {{Form::text('img', '', ['class' => 'form-control', 'placeholder' => 'Enter your role'] )}}
    </div>
    {{Form::submit('Submit', ['class' => 'btn btn-primary'])}}

    {!! Form::close() !!}
    @include('layouts.errors')

@endsection
