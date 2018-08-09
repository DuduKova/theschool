@extends('layouts.overview')

@section('container')

    <div class="col-sm-6">
        <div class="container">

    <h1>Create Course</h1>

    {!! Form::open(['action' => 'CoursesController@store', 'method' => 'POST', 'enctype' => 'multipart/form-data']) !!}
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
        {{Form::file('img', ['class' => 'form-control'] )}}
    </div>
    {{Form::submit('Submit', ['class' => 'btn btn-primary'])}}

    {!! Form::close() !!}
    @include('layouts.errors')


        </div>
    </div>

@endsection
