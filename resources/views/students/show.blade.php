@extends('layouts.overview')

@section('container')

    <div class="col-sm-6">
        <div class="container">

            <a href="/students/{{$student->id}}/edit" class="btn btn-primary float-right">Edit Student</a>

            <h1>{{$student->name}}</h1>

            <h1>{{$student->phone}}</h1>

            <img src="/storage/uploads/{{$student->img}}">

            <hr>

            <div class="list-group">
                @foreach($student->courses as $course)
                    <li class="list-group-item">
                        {{$course->name}}
                    </li>
                @endforeach
            </div>
        </div>
    </div>

@endsection