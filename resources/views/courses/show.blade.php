@extends('layouts.overview')

@section('container')

    <div class="col-sm-6">
        <div class="container">

            {!! Form::open(['action' => ['CoursesController@destroy', $course->id], 'method' => 'POST', 'class' => 'float-right']) !!}
            {{Form::hidden('_method', 'DELETE')}}
            {{Form::submit('Delete', ['class' => 'btn btn-danger'])}}

            {!! Form::close() !!}

            <a href="/courses/{{$course->id}}/edit" id="{{$course->id}}" class="btn btn-primary">Edit Course</a>


            <h1>{{$course->name}}</h1>

            <h1>{{$course->description}}</h1>

            <img src="/storage/uploads/{{$course->img}}">

            <hr>

            <div class="list-group">
                @foreach($course->students as $student)
                    <li class="list-group-item">
                        {{$student->name}}
                    </li>
                @endforeach
            </div>


        </div>
    </div>

@endsection