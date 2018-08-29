@extends('layouts.overview')

@section('container')

    <div class="col-sm-6">
        <div class="container">
            <div class="row">
                <div class="col-sm-3">
                    <h2>{{$course->name}}</h2>
                </div>
                @if(Auth::user()->role !== 'sales')
                    <div class="col-sm-9">
                        <a href="/courses/{{$course->id}}/edit" class="btn btn-primary float-right ml-5">Edit</a>
                    </div>
                @endif
            </div>

            <hr>
            <div class="card">
                <div class="row">
                    <div class="col-sm-3 m-auto">
                        <img src="/storage/uploads/{{$course->img}}" class="rounded-circle mx-auto d-block profile-pic-lg">
                    </div>
                    <div class="col-sm-9">
                        <div class="card-body pl-5">
                            <h1>{{ucfirst($course->name)}}</h1>
                            <h2>{{count($course->students)}} students attending.</h2>
                            <h4>About:</h4>
                            <p>{{$course->description}}</p>
                        </div>
                    </div>
                </div>

            </div>

            <div class="list-group">
                <div class="row">
                    <div class="col-sm-5">
                        <ul class="list-group my-list">
                            @foreach($course->students as $student)
                           @include('students.student_item')
                            @endforeach
                        </ul>
                    </div>
                </div>
            </div>


        </div>
    </div>

@endsection