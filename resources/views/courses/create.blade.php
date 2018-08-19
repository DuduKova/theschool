@extends('layouts.overview')

@section('container')

    <div class="col-sm-6">
        <div class="container">
            <div class="row">
                <div class="col-sm-3">
                    <h2>Add Course</h2>
                </div>
            </div>
            <hr>

            {!! Form::open(['action' => 'CoursesController@store', 'method' => 'POST', 'enctype' => 'multipart/form-data']) !!}
            {{Form::submit('Save', ['class' => 'btn btn-primary'])}}
            <div class="jumbotron">


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
                    {{Form::file('img', ['class' => 'form-control','id' => 'dropzone'] )}}
                    <img src="" id="myImage" class="pt-4"/>
                </div>

                {!! Form::close() !!}
                @include('layouts.errors')

            </div>
        </div>
    </div>

@endsection
