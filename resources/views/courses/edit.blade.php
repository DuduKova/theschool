@extends('layouts.overview')

@section('container')

    <div class="col-sm-6">
        <div class="container">

            <div class="row">
                <div class="col-sm-3">
                    <h2>Edit course</h2>
                </div>
            </div>
            <hr>

            @if(count($course->students) > 0)

            @else

                {!! Form::open(['action' => ['CoursesController@destroy', $course->id], 'method' => 'POST', 'class' => 'float-right delete']) !!}
                {{Form::hidden('_method', 'DELETE')}}
                {{Form::submit('Delete', ['class' => 'btn btn-danger'])}}

                {!! Form::close() !!}

            @endif

            {!! Form::open(['action' => ['CoursesController@update', $course->id], 'method' => 'POST','enctype' => 'multipart/form-data']) !!}

            {{Form::hidden('_method', 'PUT')}}
            {{Form::submit('Save', ['class' => 'btn btn-primary'])}}

            <div class="jumbotron">

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
                    {{Form::file('img', ['class' => 'form-control','id' => 'dropzone'] )}}
                    <img src="/storage/uploads/{{$course->img}}" id="myImage" class="mt-4 rounded-circle"/>
                </div>

                {!! Form::close() !!}

                <h2>Total {{count($course->students)}} students taking this course.</h2>

                @include('layouts.errors')
            </div>
        </div>
    </div>

@endsection
