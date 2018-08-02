@extends('layouts.master')

@section('container')

    <h1>{{$course->name}}</h1>

    <h1>{{$course->description}}</h1>

    <hr>

    <div class="list-group">
        @foreach($course->students as $student)
            <li class="list-group-item">
                {{$student->first_name}} {{$student->last_name}}
            </li>
        @endforeach
    </div>

@endsection