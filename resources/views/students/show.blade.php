@extends('layouts.master')

@section('container')

    <h1>{{$student->first_name}} {{$student->last_name}}</h1>

    <h1>{{$student->phone}}</h1>

    <hr>

    <div class="list-group">
        @foreach($student->courses as $course)
            <li class="list-group-item">
                {{$course->name}}
            </li>
            @endforeach
    </div>


@endsection