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
                        <a href="/courses/{{$course->id}}/edit" class="btn btn-primary float-right ml-5">Edit Course</a>
                    </div>
                @endif
            </div>

            <hr>
            <div class="card">
                <div class="row">
                    <div class="col-sm-3 m-auto">
                        <img src="/storage/uploads/{{$course->img}}" class="rounded-circle mx-auto d-block"
                             width="150px"
                             height="150px">
                    </div>
                    <div class="col-sm-9">
                        <div class="card-body pl-5">
                            <h1>{{$course->name}}, {{count($course->students)}} students attending.</h1>
                            <h4>About:</h4>
                            <p>{{$course->description}}</p>
                        </div>
                    </div>
                </div>

            </div>

            <div class="list-group">
                <div class="row">
                    <div class="col-sm-5">
                        <ul class="list-group" style="overflow-y: scroll; height: 500px">
                            @foreach($course->students as $student)
                                <a href="/students/{{$student->id}}" class="list-group-item list-group-item-action" role="tab">
                                    <div class="card bg-light font-weight-bold text-dark">
                                        <div class="row">
                                            <div class="col-sm-5 card-img m-auto pl-4">
                                                <img src="/storage/uploads/{{$student->img}}" class="rounded-circle float-left" width="50px" height="50px">
                                            </div>
                                            <div class="col-sm-7 card-body">
                                                {{$student->name}}
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