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

                    <!-- Select With One Default -->
                    <div class="form-group">
                        {!! Form::label('select', 'Select w/Default', ['class' => 'col-lg-2 control-label'] )  !!}
                        <div class="col-lg-10">
                            {!!  Form::select('select', ['sales' => 'Sales', 'manager' => 'Manager'],  'S', ['class' => 'form-control' ]) !!}
                        </div>
                    </div>

                </fieldset>

                {!! Form::close()  !!}

            </div>

        </div>
    </div>

@endsection