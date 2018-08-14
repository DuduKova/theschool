@extends('layouts.overview')

@section('container')

    <div class="col-sm-6">
        <div class="container">
            <div class="row">
                <div class="col-sm-3">
                    <h2>Add student</h2>
                </div>
            </div>
            <hr>

            {!! Form::open(['action' => 'StudentsController@store', 'method' => 'POST', 'enctype' => 'multipart/form-data']) !!}
            {{Form::submit('Save', ['class' => 'btn btn-primary'])}}

            <div class="jumbotron">

                <div class="form-group">
                    {{Form::label('name', 'Name')}}
                    {{Form::text('name', '', ['class' => 'form-control', 'placeholder' => 'Enter your name'] )}}
                </div>
                <div class="form-group">
                    {{Form::label('email', 'Email')}}
                    {{Form::email('email', '', ['class' => 'form-control', 'placeholder' => 'Enter your email'] )}}
                </div>
                <div class="form-group">
                    {{Form::label('phone', 'Phone')}}
                    {{Form::text('phone', '', ['class' => 'form-control', 'placeholder' => 'Enter your phone'] )}}
                </div>
                <div class="form-group">
                    {{Form::label('img', 'IMG')}}
                    {{Form::file('img', ['class' => 'form-control'] )}}
                </div>

                <h6>Courses:</h6>
                <ul class="form-check form-check-inline list-inline">

                    @foreach($courses as $course)
                        <li class="list-inline-item">
                            <input class="form-check-input" type="checkbox" id="{{$course->name}}" value="{{$course->id}}" name="course[]">
                            <label class="form-check-label" for="{{$course->name}}">{{$course->name}}</label>
                        </li>
                    @endforeach

                </ul>

                {!! Form::close() !!}

                @include('layouts.errors')
            </div>
        </div>
    </div>

@endsection