@extends('layouts.master')

@section('coursesList')
    <div class="col-sm-3">
        <div class="row">
            <div class="col-sm-9">
                <h4>Courses</h4>
                <!-- ->toFormattedDateString()-->
            </div>
            <div class="col-sm-3">
                <button class="btn btn-success" href="/courses/create">+</button>
            </div>
        </div>
        <hr>
        @foreach($courses as $course)

            <a href="/courses/{{$course->id}}"><div class="card">
                    <div class="row">
                        <div class="col-sm-6 card-img">
                            <img src="{{asset($course->img)}}">
                        </div>
                        <div class="col-sm-6 card-body">
                            {{$course->name}}
                            {{$course->description}}
                        </div>
                    </div>

                </div></a>

        @endforeach
    </div>

@endsection