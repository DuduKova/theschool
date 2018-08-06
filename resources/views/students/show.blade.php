@extends('layouts.master')

@section('container')

    <a href="/students" class="btn btn-info">Go Back</a>

    <h1>{{$student->name}}</h1>

    <h1>{{$student->phone}}</h1>

    <a href="/students/{{$student->id}}/edit" class="btn btn-primary">Edit Student</a>

    <hr>

    <div class="list-group">
        @foreach($student->courses as $course)
            <li class="list-group-item">
                {{$course->name}}
            </li>
        @endforeach
    </div>

    {!! Form::open(['action' => ['StudentsController@destroy', $student->id], 'method' => 'POST', 'class' => 'float-right']) !!}
    {{Form::hidden('_method', 'DELETE')}}
    {{Form::submit('Delete', ['class' => 'btn btn-danger'])}}

    {!! Form::close() !!}


@endsection