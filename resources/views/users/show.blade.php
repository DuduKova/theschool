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
                        <h2>User</h2>
                    </div>
                    <div class="col-sm-9">
                        <a href="/users/{{$user->id}}/edit" class="btn btn-primary float-right ml-5">Edit</a>
                    </div>
                </div>

                <hr>

                <div class="card">
                    <div class="card-header pl-5">
                        <h1>Name: {{ucfirst($user->name)}}</h1>
                    </div>
                    <div class="card-body pl-5">
                        <h1>Phone: {{$user->phone}}</h1>
                        <h1>Email: {{$user->email}}</h1>
                        <h1>Role: {{ucfirst($user->role)}}</h1>
                    </div>
                    <div class="card-img pl-5 pb-5">
                        <img src="/storage/uploads/{{$user->img}}" class="rounded-circle float-left profile-pic-lg">
                    </div>
                </div>
            </div>
        </div>

    @endif

@endsection