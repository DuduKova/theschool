@extends('layouts.overview')

@section('container')

    <div class="col-sm-6">
        <div class="container">
            <div class="row">
                <div class="col-sm-3">
                    <h2>Student</h2>
                </div>
                <div class="col-sm-9">
                    <a href="/students/{{$student->id}}/edit" class="btn btn-primary float-right ml-5">Edit</a>
                </div>
            </div>
            <hr>
            <div class="card">
                <div class="row">
                    <div class="col-sm-3 m-auto">
                            <img src="/storage/uploads/{{$student->img}}" class="rounded-circle mx-auto d-block" width="150px"
                                 height="150px">
                    </div>
                    <div class="col-sm-9">
                        <div class="card-header pl-5">
                            <h1>Name: {{$student->name}}</h1>
                        </div>
                        <div class="card-body pl-5">
                            <h5>Phone: {{$student->phone}}</h5>
                            <h5>Email: {{$student->email}}</h5>
                        </div>
                    </div>
                </div>

            </div>

            <div class="list-group">
                <div class="row">
                    <div class="col-sm-5">
                        <ul  class="list-group" style="overflow-y: scroll; height: 500px">
                        @foreach($student->courses as $course)
                            <a href="/courses/{{$course->id}}" class="list-group-item list-group-item-action" role="tab">
                                <div class="card bg-light font-weight-bold text-dark">
                                    <div class="row">
                                        <div class="col-sm-5 card-img m-auto pl-4">
                                            <img src="/storage/uploads/{{$course->img}}" class="rounded-circle float-left" width="50px" height="50px">
                                        </div>
                                        <div class="col-sm-7 card-body">
                                            {{$course->name}}
                                        </div>
                                    </div>

                                </div>
                            </a>
                        @endforeach
                        </ul>
                    </div>
                </div>

            </div>
        </div>
    </div>

@endsection