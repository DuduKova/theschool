@extends('layouts.master')

@section('studentsList')
    <div class="col-sm-3">
        <div class="row">
            <div class="col-sm-9">
                <h4>Students</h4>
                <!-- ->toFormattedDateString()-->
            </div>
            <div class="col-sm-3">
                <button class="btn btn-success" href="/create">+</button>
            </div>
        </div>
    <hr>
        @foreach($students as $student)

            <a href="/students/{{$student->id}}"><div class="card">
                    <div class="row">
                        <div class="col-sm-6 card-img">
                            <img src="{{asset($student->img)}}">
                        </div>
                        <div class="col-sm-6 card-body">
                            {{$student->first_name}} {{$student->last_name}}
                            {{$student->phone}}
                        </div>
                    </div>

                </div></a>

        @endforeach
    </div>

@endsection