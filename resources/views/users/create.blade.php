@extends('layouts.adminOverview')

@section('container')

    <div class="col-sm-9">
        <div class="container">

            <div class="well">

                {!! Form::open(['action' => 'UsersController@store', 'method' => 'POST', 'enctype' => 'multipart/form-data']) !!}

                <fieldset>

                    <!-- Submit Button -->
                    <div class="form-group">
                        <div class="col-lg-10 col-lg-offset-2">
                            {!! Form::submit('Create', ['class' => 'btn btn-lg btn-info pull-right'] ) !!}
                        </div>
                    </div>

                    <!-- Name -->

                    <div class="form-group">
                        {{Form::label('name', 'Name:',['class' => 'col-lg-2 control-label'])}}
                        <div class="col-lg-10">
                            {{Form::text('name', '', ['class' => 'form-control', 'placeholder' => 'Enter your name'] )}}
                        </div>
                    </div>

                    <!-- Phone -->

                    <div class="form-group">
                        {{Form::label('phone', 'Phone:',['class' => 'col-lg-2 control-label'])}}
                        <div class="col-lg-10">
                            {{Form::text('phone', '', ['class' => 'form-control', 'placeholder' => 'Enter your phone'] )}}
                        </div>
                    </div>

                    <!-- Email -->
                    <div class="form-group">
                        {!! Form::label('email', 'Email:', ['class' => 'col-lg-2 control-label']) !!}
                        <div class="col-lg-10">
                            {!! Form::email('email', '', ['class' => 'form-control', 'placeholder' => 'email']) !!}
                        </div>
                    </div>

                    <!-- Password -->
                    <div class="form-group">
                        {!! Form::label('password', 'Password:', ['class' => 'col-lg-2 control-label']) !!}
                        <div class="col-lg-10">
                            {!! Form::password('password',['class' => 'form-control', 'placeholder' => 'Password', 'type' => 'password']) !!}
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
                    <div class="form-group">
                        {!! Form::label('role', 'Select w/Default', ['class' => 'col-lg-2 control-label'] )  !!}
                        <div class="col-lg-10">
                            {!!  Form::select('role', ['sales' => 'Sales', 'manager' => 'Manager'],  'S', ['class' => 'form-control' ]) !!}
                        </div>
                    </div>

                    <!-- IMG -->

                    <div class="form-group">
                        {{Form::label('img', 'IMG' , ['class' => 'col-lg-2 control-label'])}}
                        <div class="col-lg-10">
                            {{Form::file('img',['class' => 'form-control'] )}}
                        </div>
                    </div>

                </fieldset>

                {!! Form::close()  !!}

            </div>

        </div>
    </div>

@endsection