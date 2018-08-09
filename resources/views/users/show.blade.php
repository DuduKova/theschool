@extends('layouts.adminOverview')

@section('container')

    <div class="col-sm-6">
        <div class="container">

            <a href="/users/{{$user->id}}/edit" class="btn btn-primary float-right">Edit User</a>

            <h1>{{$user->name}}</h1>

            <h1>{{$user->phone}}</h1>

            <img src="/storage/uploads/{{$user->img}}">

            <hr>

        </div>
    </div>

@endsection