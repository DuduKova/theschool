@extends('layouts.master')

@section('adminsList')
    <div class="col-sm-3">
        <div class="row">
            <div class="col-sm-9">
                <h4>Admins</h4>
                <!-- ->toFormattedDateString()-->
            </div>
            <div class="col-sm-3">
                <button class="btn btn-success" href="/create">+</button>
            </div>
        </div>
        <hr>
        @foreach($users as $user)

            <a href="/users/{{$user->id}}"><div class="card">
                    <div class="row">
                        <div class="col-sm-6 card-img">
                            <img src="{{asset($user->img)}}">
                        </div>
                        <div class="col-sm-6 card-body">
                            {{$user->name}}
                            {{$user->phone}}
                        </div>
                    </div>

                </div></a>

        @endforeach
    </div>

@endsection