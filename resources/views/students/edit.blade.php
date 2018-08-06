@extends('layouts.master')

@section('container')

    <h1>Edit student</h1>

    {!! Form::open(['action' => 'StudentsController@update', 'method' => 'POST']) !!}
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
        {{Form::text('img', $student->img, ['class' => 'form-control', 'placeholder' => 'Enter your img'] )}}
    </div>
    {{Form::submit('Submit', ['class' => 'btn btn-primary'])}}

    {!! Form::close() !!}

    @include('layouts.errors')


@endsection