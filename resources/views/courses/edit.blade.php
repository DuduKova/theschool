@extends('layouts.overview')

@section('container')

    <div class="col-sm-6">
        <div class="container">

            <div class="row">
                <div class="col-sm-3">
                    <h2>
                        @isset($course)
                            Edit course
                        @endisset

                        @empty($course)
                            Add course
                        @endempty
                    </h2>


                </div>
            </div>
            <hr>
            @isset($course)
                @if(count($course->students) > 0)

                @else

                    {!! Form::open(['action' => ['CoursesController@destroy', $course->id], 'method' => 'POST', 'class' => 'float-right delete']) !!}
                    {{Form::hidden('_method', 'DELETE')}}
                    {{Form::submit('Delete', ['class' => 'btn btn-danger'])}}

                    {!! Form::close() !!}

                @endif
            @endisset

            @isset($course)
                {!! Form::open(['action' => ['CoursesController@update', $course->id], 'method' => 'POST','enctype' => 'multipart/form-data']) !!}
                {{Form::hidden('_method', 'PUT')}}
            @endisset

            @empty($course)
                {!! Form::open(['action' => 'CoursesController@store', 'method' => 'POST', 'enctype' => 'multipart/form-data']) !!}
            @endempty

            {{Form::submit('Save', ['class' => 'btn btn-primary'])}}


            <div class="jumbotron">

                <div class="form-group">
                    {{Form::label('name', 'Name')}}
                    @isset($course)
                        {{Form::text('name', $course->name, ['class' => 'form-control', 'placeholder' => 'Enter your name'] )}}
                    @endisset

                    @empty($course)
                        {{Form::text('name', '', ['class' => 'form-control', 'placeholder' => 'Enter your name'] )}}
                    @endempty

                </div>
                <div class="form-group">
                    {{Form::label('description', 'Description')}}
                    @isset($course)
                        {{Form::textarea('description', $course->description, ['id'=> 'description','class' => 'form-control', 'placeholder' => 'Enter your course'] )}}
                    @endisset

                    @empty($course)
                        {{Form::textarea('description', '', ['id'=> 'description','class' => 'form-control', 'placeholder' => 'Enter your course'] )}}
                    @endempty

                </div>
                <div class="form-group">
                    {{Form::label('img', 'IMG')}}
                    {{Form::file('img', ['class' => 'form-control','id' => 'img'] )}}

                    @isset($course)
                        <img src="/storage/uploads/{{$course->img}}" id="myImage" class="mt-4 rounded-circle"/>
                    @endisset

                    @empty($course)
                        <img src="/storage/uploads/default.png" id="myImage" class="mt-4 rounded-circle"/>
                    @endempty

                </div>

                {!! Form::close() !!}

                @isset($course)
                    <h2>Total {{count($course->students)}} students taking this course.</h2>
                @endisset

                @include('layouts.errors')
            </div>
        </div>
    </div>

@endsection
