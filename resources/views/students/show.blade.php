@extends('layouts.overview')

@section('container')

    <div class="col-sm-6 shadow">
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
                            <img src="/storage/uploads/{{$student->img}}" class="rounded-circle mx-auto d-block profile-pic-lg">
                    </div>
                    <div class="col-sm-9">
                        <div class="card-header pl-5">
                            <h1>Name: {{ucfirst($student->name)}}</h1>
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
                        <ul  class="list-group my-list">
                        @foreach($student->courses as $course)
                                @include('courses.course_item')
                            @endforeach
                        </ul>
                    </div>
                </div>

            </div>
        </div>
    </div>

@endsection