@extends('layouts.overview')

@section('container')

    <div class="col-sm-6">
        <div class="container">
            @if(Auth::user()->role !== 'sales')
            <a href="/courses/{{$course->id}}/edit" class="btn btn-primary float-right ml-5">Edit Course</a>
            @endif
            <div class="card ">
                <div class="card-header pl-5">
                    <h1>Name: {{$course->name}}</h1>
                </div>
                <div class="card-body pl-5">
                    <h4>About:</h4><p>{{$course->description}}</p>
                </div>
                <div class="card-img pl-5 pb-5">
                    <img src="/storage/uploads/{{$course->img}}" class="rounded-circle float-left" width="50px"
                         height="50px">
                </div>
            </div>

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