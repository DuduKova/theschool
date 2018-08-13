@extends('layouts.overview')

@section('container')

    <div class="col-sm-6">
        <div class="container">


            <a href="/students/{{$student->id}}/edit" class="btn btn-primary float-right ml-5">Edit Student</a>
            <div class="card ">
                <div class="card-header pl-5">
                    <h1>Name: {{$student->name}}</h1>
                </div>
                <div class="card-body pl-5">
                    <h1>Phone: {{$student->phone}}</h1>
                    <h1>Email: {{$student->email}}</h1>
                </div>
                <div class="card-img pl-5 pb-5">
                    <img src="/storage/uploads/{{$student->img}}" class="rounded-circle float-left" width="50px" height="50px">
                </div>
            </div>

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