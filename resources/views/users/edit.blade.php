@extends('layouts.adminOverview')

@section('container')

    <div class="col-sm-9">
        <div class="container">
            <div class="row">
                <div class="col-sm-3">
                    <h2>
                        @isset($user)
                            Edit User
                        @endisset

                        @empty($user)
                            Add User
                        @endempty
                    </h2>
                </div>
            </div>
            <hr>
            <!-- Delete btn -->

        @isset($user)

            @if($user->id == 1)

            @else
                {!! Form::open(['action' => ['UsersController@destroy', $user->id], 'method' => 'POST', 'class' => 'float-right delete']) !!}
                {{Form::hidden('_method', 'DELETE')}}
                {{Form::submit('Delete', ['class' => 'btn btn-danger'])}}

                {!! Form::close() !!}
            @endif

            <!-- Submit btn -->

                {!! Form::open(['action' => ['UsersController@update', $user->id , 'class' => 'form-horizontal'], 'method' => 'POST','enctype' => 'multipart/form-data']) !!}
                {{Form::hidden('_method', 'PUT')}}
            @endisset

            @empty($user)
                {!! Form::open(['action' => 'UsersController@store', 'method' => 'POST', 'enctype' => 'multipart/form-data']) !!}
            @endempty

            {!! Form::submit('Save', ['class' => 'btn btn-primary'] ) !!}


            <div class="jumbotron">
                <!-- Name -->

                <div class="form-group">
                    {{Form::label('name', 'Name:',['class' => 'col-lg-2 control-label'])}}
                    <div class="col-lg-10">
                        @isset($user)
                            {{Form::text('name', $user->name, ['class' => 'form-control', 'placeholder' => 'Enter your name'] )}}
                        @endisset

                        @empty($user)
                            {{Form::text('name', '', ['class' => 'form-control', 'placeholder' => 'Enter your name'] )}}
                        @endempty

                    </div>
                </div>

                <!-- Phone -->

                <div class="form-group">
                    {{Form::label('phone', 'Phone:',['class' => 'col-lg-2 control-label'])}}
                    <div class="col-lg-10">
                        @isset($user)
                            {{Form::text('phone', $user->phone, ['class' => 'form-control', 'placeholder' => 'Enter your phone'] )}}
                        @endisset

                        @empty($user)
                            {{Form::text('phone', '', ['class' => 'form-control', 'placeholder' => 'Enter your phone'] )}}
                        @endempty

                    </div>
                </div>

                <!-- Email -->
                <div class="form-group">
                    {!! Form::label('email', 'Email:', ['class' => 'col-lg-2 control-label']) !!}
                    <div class="col-lg-10">
                        @isset($user)
                            {!! Form::email('email', $user->email, ['class' => 'form-control', 'placeholder' => 'email']) !!}
                        @endisset

                        @empty($user)
                            {!! Form::email('email', '', ['class' => 'form-control', 'placeholder' => 'email']) !!}
                        @endempty

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
                @isset($user)
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
                @endisset

                @empty($user)

                    <div class="form-group">
                        {!! Form::label('role', 'Select Role', ['class' => 'col-lg-2 control-label'] )  !!}
                        <div class="col-lg-10">
                            {!!  Form::select('role', ['sales' => 'Sales', 'manager' => 'Manager'],  'S', ['class' => 'form-control' ]) !!}
                        </div>
                    </div>

            @endempty

            <!-- IMG -->

                <div class="form-group">
                    {{Form::label('img', 'IMG' , ['class' => 'col-lg-2 control-label'])}}
                    <div class="col-lg-10">
                        {{Form::file('img',['class' => 'form-control','id' => 'img'] )}}
                    </div>
                    @isset($user)
                        <img src="/storage/uploads/{{$user->img}}" id="myImage" class="ml-3 mt-4 rounded-circle"/>
                    @endisset

                    @empty($user)
                        <img src="/storage/uploads/default.png" id="myImage" class="ml-3 mt-4 rounded-circle"/>
                    @endempty

                </div>

            </div>

            {!! Form::close()  !!}

        </div>
    </div>

@endsection