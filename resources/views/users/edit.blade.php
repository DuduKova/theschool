@extends('layouts.adminOverview')

@section('container')

    @if($user->id == 1 && Auth::user()->role !== 'Owner')

        <div class="col-sm-9 alert alert-danger">
            <h1 align="center">You are not authorize to see this page.</h1>
        </div>

    @else

        <div class="col-sm-9">
            <div class="container">
                <div class="row">
                    <div class="col-sm-3">
                        <h2>Edit User</h2>
                    </div>
                </div>
                <hr>
                <!-- Delete btn -->
            {!! Form::open(['action' => ['UsersController@destroy', $user->id], 'method' => 'POST', 'class' => 'float-right delete']) !!}
            {{Form::hidden('_method', 'DELETE')}}
            {{Form::submit('Delete', ['class' => 'btn btn-lg btn-danger'])}}

            {!! Form::close() !!}

            <!-- Submit btn -->

                {!! Form::open(['action' => ['UsersController@update', $user->id , 'class' => 'form-horizontal'], 'method' => 'POST','enctype' => 'multipart/form-data']) !!}

                {!! Form::submit('Save', ['class' => 'btn btn-lg btn-info'] ) !!}


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

                    @if(Auth::user()->role == 'Owner')

                        @if($user->role == 'Owner')

                            <div class="form-group">
                                {!! Form::label('role', 'Select Role', ['class' => 'col-lg-2 control-label'] )  !!}
                                <div class="col-lg-10">
                                    {!!  Form::select('role',['Owner' => 'Owner'],  $user->role, ['class' => 'form-control' ]) !!}
                                </div>
                            </div>


                        @else

                            <div class="form-group">
                                {!! Form::label('role', 'Select Role', ['class' => 'col-lg-2 control-label'] )  !!}
                                <div class="col-lg-10">
                                    {!!  Form::select('role',['sales' => 'Sales', 'manager' => 'Manager'],  $user->role, ['class' => 'form-control' ]) !!}
                                </div>
                            </div>

                    @endif

                @else



                @endif

                <!-- IMG -->

                    <div class="form-group">
                        {{Form::label('img', 'IMG' , ['class' => 'col-lg-2 control-label'])}}
                        <div class="col-lg-10">
                            {{Form::file('img',['class' => 'form-control','id' => 'dropzone'] )}}
                        </div>
                        <img src="/storage/uploads/{{$user->img}}" id="myImage" class="mt-4 rounded-circle"/>
                    </div>

                </div>


                {{Form::hidden('_method', 'PUT')}}

                {!! Form::close()  !!}



                @include('layouts.errors')

            </div>
        </div>

    @endif

@endsection