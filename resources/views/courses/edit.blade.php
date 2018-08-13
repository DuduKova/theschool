@extends('layouts.overview')

@section('container')

    <div class="col-sm-6">
        <div class="container">
            {!! Form::open(['action' => ['CoursesController@destroy', $course->id], 'method' => 'POST', 'class' => 'float-right']) !!}
            {{Form::hidden('_method', 'DELETE')}}
            {{Form::submit('Delete', ['class' => 'btn btn-danger'])}}

            {!! Form::close() !!}

            <h1>Edit Course</h1>

            {!! Form::open(['action' => ['CoursesController@update', $course->id], 'method' => 'POST','enctype' => 'multipart/form-data']) !!}
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
                {{Form::file('img', ['class' => 'form-control'] )}}
            </div>
            {{Form::hidden('_method', 'PUT')}}
            {{Form::submit('Submit', ['class' => 'btn btn-primary'])}}

            {!! Form::close() !!}

            @include('layouts.errors')


        </div>
    </div>

@endsection
