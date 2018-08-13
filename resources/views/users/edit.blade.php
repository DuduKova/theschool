@extends('layouts.adminOverview')

@section('container')


    <div class="col-sm-9">
        <div class="container">

            <div class="well">
                <fieldset>

                    <legend>Update Details</legend>

                    <!-- Submit Button -->
                    <div class="form-group">
                        <div class="col-lg-10 col-lg-offset-2">
                            {!! Form::open(['action' => ['UsersController@destroy', $user->id], 'method' => 'POST', 'class' => 'float-right']) !!}
                            {{Form::hidden('_method', 'DELETE')}}
                            {{Form::submit('Delete', ['class' => 'btn btn-danger'])}}

                            {!! Form::close() !!}

                            {!! Form::open(['action' => ['UsersController@update', $user->id , 'class' => 'form-horizontal'], 'method' => 'POST','enctype' => 'multipart/form-data']) !!}

                            {!! Form::submit('Save', ['class' => 'btn btn-lg btn-info'] ) !!}
                        </div>
                    </div>

                    <div class="jumbotron">


                        <!-- Name -->

                        <div class="form-group">
                            {{Form::label('name', 'Name:',['class' => 'col-lg-2 control-label'])}}
                            <div class="col-lg-10">
                                {{Form::text('name', $user->name, ['class' => 'form-control', 'placeholder' => 'Enter your name'] )}}
                            </div>
                        </div>

                        <!-- Phone -->

                        <div class="form-group">
                            {{Form::label('phone', 'Phone:',['class' => 'col-lg-2 control-label'])}}
                            <div class="col-lg-10">
                                {{Form::text('phone', $user->phone, ['class' => 'form-control', 'placeholder' => 'Enter your phone'] )}}
                            </div>
                        </div>

                        <!-- Email -->
                        <div class="form-group">
                            {!! Form::label('email', 'Email:', ['class' => 'col-lg-2 control-label']) !!}
                            <div class="col-lg-10">
                                {!! Form::email('email', $user->email, ['class' => 'form-control', 'placeholder' => 'email']) !!}
                            </div>
                        </div>

                        <!-- Password -->
                        <div class="form-group">
                            {!! Form::label('password', 'Password:', ['class' => 'col-lg-2 control-label']) !!}
                            <div class="col-lg-10">
                                {!! Form::password('password', ['class' => 'form-control', 'placeholder' => 'Password']) !!}
                            </div>
                        </div>

                        <!-- Confirm -->
                        <div class="form-group">
                            {!! Form::label('password_confirmation', 'Confirmation:', ['class' => 'col-lg-2 control-label']) !!}
                            <div class="col-lg-10">
                                {!! Form::password('password_confirmation', ['class' => 'form-control', 'placeholder' => 'Password Confirmation']) !!}
                            </div>
                        </div>

                        <!-- Select With One Default -->


                        @if($user->role == 'sales')

                        <div class="form-group">
                            {!! Form::label('role', 'Select w/Default', ['class' => 'col-lg-2 control-label'] )  !!}
                            <div class="col-lg-10">
                                {!!  Form::select('role',['sales' => 'Sales', 'manager' => 'Manager'],  'S', ['class' => 'form-control' ]) !!}
                            </div>
                        </div>
                         @else
                        <div class="form-group">
                            {!! Form::label('role', 'Select w/Default', ['class' => 'col-lg-2 control-label'] )  !!}
                            <div class="col-lg-10">
                                {!!  Form::select('role',['manager' => 'Manager','sales' => 'Sales'],  'S', ['class' => 'form-control' ]) !!}
                            </div>
                        </div>

                        @endif


                        <!-- IMG -->

                        <div class="form-group">
                            {{Form::label('img', 'IMG' , ['class' => 'col-lg-2 control-label'])}}
                            <div class="col-lg-10">
                                {{Form::file('img',['class' => 'form-control'] )}}
                            </div>
                        </div>

                    </div>

                </fieldset>
                {{Form::hidden('_method', 'PUT')}}

                {!! Form::close()  !!}

            </div>

            @include('layouts.errors')

        </div>
    </div>

@endsection