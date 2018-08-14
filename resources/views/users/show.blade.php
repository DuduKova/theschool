@extends('layouts.adminOverview')

@section('container')

    @if($user->id == 1 && Auth::user()->role !== 'Owner')

        <div class="col-sm-9 alert alert-danger">
            <h1 align="center">You are not authorize to see this page.</h1>
        </div>

    @else

        <div class="col-sm-9">
            <div class="container">
                <a href="/users/{{$user->id}}/edit" class="btn btn-primary float-right ml-5">Edit User</a>
                <div class="card">
                    <div class="card-header pl-5">
                        <h1>Name: {{$user->name}}</h1>
                    </div>
                    <div class="card-body pl-5">
                        <h1>Phone: {{$user->phone}}</h1>
                        <h1>Email: {{$user->email}}</h1>
                        <h1>Role: {{$user->role}}</h1>
                    </div>
                    <div class="card-img pl-5 pb-5">
                        <img src="/storage/uploads/{{$user->img}}" class="rounded-circle float-left" width="50px"
                             height="50px">
                    </div>
                </div>
            </div>
        </div>

    @endif

@endsection