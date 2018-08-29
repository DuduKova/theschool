@extends('layouts.overview')

@section('container')

    <div class="col-sm-6">
        <div class="container">

            <div class="row">
                <div class="col-sm-3">
                    <h2>
                        @isset($student)
                            Edit student
                        @endisset

                        @empty($student)
                            Add student
                        @endempty
                    </h2>
                </div>
            </div>

            <hr>

            @isset($student)

                {!! Form::open(['action' => ['StudentsController@destroy', $student->id], 'method' => 'POST', 'class' => 'float-right delete']) !!}
                {{Form::hidden('_method', 'DELETE')}}
                {{Form::submit('Delete', ['class' => 'btn btn-danger'])}}

                {!! Form::close() !!}

                {!! Form::open(['action' => ['StudentsController@update', $student->id], 'method' => 'POST','enctype' => 'multipart/form-data']) !!}

                {{Form::hidden('_method', 'PUT')}}
            @endisset

            @empty($student)
                {!! Form::open(['action' => 'StudentsController@store', 'method' => 'POST', 'enctype' => 'multipart/form-data']) !!}
            @endempty

            {{Form::submit('Save', ['class' => 'btn btn-primary'])}}

            <div class="jumbotron">

                <div class="form-group">
                    {{Form::label('name', 'Name')}}
                    @isset($student)
                        {{Form::text('name', $student->name, ['class' => 'form-control', 'placeholder' => 'Enter your name'] )}}
                    @endisset

                    @empty($student)
                        {{Form::text('name', '', ['class' => 'form-control', 'placeholder' => 'Enter your name'] )}}
                    @endempty

                </div>
                <div class="form-group">
                    {{Form::label('email', 'Email')}}
                    @isset($student)
                        {{Form::email('email', $student->email, ['class' => 'form-control', 'placeholder' => 'Enter your email'] )}}
                    @endisset

                    @empty($student)
                        {{Form::email('email', '', ['class' => 'form-control', 'placeholder' => 'Enter your email'] )}}
                    @endempty

                </div>
                <div class="form-group">
                    {{Form::label('phone', 'Phone')}}
                    @isset($student)
                        {{Form::text('phone', $student->phone, ['class' => 'form-control', 'placeholder' => 'Enter your phone'] )}}
                    @endisset

                    @empty($student)
                        {{Form::text('phone', '', ['class' => 'form-control', 'placeholder' => 'Enter your phone'] )}}
                    @endempty

                </div>
                <div class="form-group">
                    {{Form::label('img', 'IMG')}}
                    {{Form::file('img', ['class' => 'form-control','id' => 'img'] )}}
                    @isset($student)
                        <img src="/storage/uploads/{{$student->img}}" id="myImage" class="mt-4 rounded-circle"/>
                    @endisset

                    @empty($student)
                        <img src="/storage/uploads/default.png" id="myImage" class="mt-4 rounded-circle"/>
                    @endempty


                </div>

                <h6>Courses:</h6>
                <div class="container">
                    <ul class="form-check-inline">
                        <div class="row">
                            @isset($student)
                                @foreach($courses as $course)
                                    @if(count($student->courses) == 0)
                                        @include('students.student_course')
                                    @else

                                        @foreach($student->courses as $courseAttending)
                                            @if($courseAttending->id === $course->id)
                                                <li class="list-group-item col-sm-3">
                                                    <input class="form-check-input" type="checkbox"
                                                           id="{{$course->name}}"
                                                           value="{{$course->id}}" name="course[]" checked>
                                                    <label class="form-check-label"
                                                           for="{{$course->name}}">{{$course->name}}</label>
                                                </li>
                                                @break

                                            @else

                                            @endif
                                        @endforeach
                                        @if($courseAttending->id === $course->id)

                                        @else
                                            @include('students.student_course')
                                        @endif
                                    @endif


                                @endforeach
                            @endisset

                            @empty($student)
                                @foreach($courses as $course)
                                    @include('students.student_course')
                                @endforeach

                            @endempty

                        </div>
                    </ul>
                </div>


                {!! Form::close() !!}

                @include('layouts.errors')

            </div>

        </div>
    </div>


@endsection