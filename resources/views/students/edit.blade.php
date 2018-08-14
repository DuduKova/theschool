@extends('layouts.overview')

@section('container')

    <div class="col-sm-6">
        <div class="container">

            <div class="row">
                <div class="col-sm-3">
                    <h2>Edit student</h2>
                </div>
            </div>

            <hr>

            {!! Form::open(['action' => ['StudentsController@destroy', $student->id], 'method' => 'POST', 'class' => 'float-right']) !!}
            {{Form::hidden('_method', 'DELETE')}}
            {{Form::submit('Delete', ['class' => 'btn btn-danger'])}}

            {!! Form::close() !!}

            {!! Form::open(['action' => ['StudentsController@update', $student->id], 'method' => 'POST','enctype' => 'multipart/form-data']) !!}

            {{Form::hidden('_method', 'PUT')}}
            {{Form::submit('Submit', ['class' => 'btn btn-primary'])}}

            <div class="jumbotron">

                <div class="form-group">
                    {{Form::label('name', 'Name')}}
                    {{Form::text('name', $student->name, ['class' => 'form-control', 'placeholder' => 'Enter your name'] )}}
                </div>
                <div class="form-group">
                    {{Form::label('email', 'Email')}}
                    {{Form::email('email', $student->email, ['class' => 'form-control', 'placeholder' => 'Enter your email'] )}}
                </div>
                <div class="form-group">
                    {{Form::label('phone', 'Phone')}}
                    {{Form::text('phone', $student->phone, ['class' => 'form-control', 'placeholder' => 'Enter your phone'] )}}
                </div>
                <div class="form-group">
                    {{Form::label('img', 'IMG')}}
                    {{Form::file('img', ['class' => 'form-control'] )}}
                </div>

                <h6>Courses:</h6>
                <div class="form-check form-check-inline">

                    @foreach($courses as $course)

                        {{Form::label('course' , $course->name),['class' => 'form-check-label']}}
                        {{Form::checkbox('course',$course->id)}}

                    @endforeach
                </div>


                {!! Form::close() !!}

                @include('layouts.errors')

            </div>

        </div>
    </div>


@endsection