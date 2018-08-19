@extends('layouts.overview')

@section('container')

    <div class="col-sm-6">
        <div class="container">

            <div class="row">
                <div class="col-sm-3">
                    <h2>Edit student</h2>
                </div>
            </div>

            <hr>

            {!! Form::open(['action' => ['StudentsController@destroy', $student->id], 'method' => 'POST', 'class' => 'float-right delete']) !!}
            {{Form::hidden('_method', 'DELETE')}}
            {{Form::submit('Delete', ['class' => 'btn btn-danger'])}}

            {!! Form::close() !!}

            {!! Form::open(['action' => ['StudentsController@update', $student->id], 'method' => 'POST','enctype' => 'multipart/form-data']) !!}

            {{Form::hidden('_method', 'PUT')}}
            {{Form::submit('Save', ['class' => 'btn btn-primary'])}}

            <div class="jumbotron">

                <div class="form-group">
                    {{Form::label('name', 'Name')}}
                    {{Form::text('name', $student->name, ['class' => 'form-control', 'placeholder' => 'Enter your name'] )}}
                </div>
                <div class="form-group">
                    {{Form::label('email', 'Email')}}
                    {{Form::email('email', $student->email, ['class' => 'form-control', 'placeholder' => 'Enter your email'] )}}
                </div>
                <div class="form-group">
                    {{Form::label('phone', 'Phone')}}
                    {{Form::text('phone', $student->phone, ['class' => 'form-control', 'placeholder' => 'Enter your phone'] )}}
                </div>
                <div class="form-group">
                    {{Form::label('img', 'IMG')}}
                    {{Form::file('img', ['class' => 'form-control','id' => 'dropzone'] )}}
                    <img src="/storage/uploads/{{$student->img}}" id="myImage" class="mt-4 rounded-circle"/>
                </div>

                <h6>Courses:</h6>
                <div class="container">
                    <ul class="form-check-inline">
                        <div class="row">
                    @foreach($courses as $course)
                        <li class="list-group-item col-sm-3">
                            @if(count($student->courses) == 0)
                                <input class="form-check-input" type="checkbox" id="{{$course->name}}"
                                       value="{{$course->id}}" name="course[]">
                                <label class="form-check-label" for="{{$course->name}}">{{$course->name}}</label>
                        </li>
                                @else

                            @foreach($student->courses as $courseAttending)
                                @if($courseAttending->id === $course->id)

                                    <input class="form-check-input" type="checkbox" id="{{$course->name}}"
                                           value="{{$course->id}}" name="course[]" checked>
                                    <label class="form-check-label" for="{{$course->name}}">{{$course->name}}</label>
                                    @break

                                @else

                                @endif
                            @endforeach
                            @if($courseAttending->id === $course->id)

                            @else
                                <input class="form-check-input" type="checkbox" id="{{$course->name}}"
                                       value="{{$course->id}}" name="course[]">
                                <label class="form-check-label" for="{{$course->name}}">{{$course->name}}</label>
                        </li>
                        @endif
                        @endif


                    @endforeach
                </div>
                </ul>
            </div>


                {!! Form::close() !!}

                @include('layouts.errors')

            </div>

        </div>
    </div>


@endsection