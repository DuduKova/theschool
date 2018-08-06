<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="/public/favicon.ico">

    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'The School') }}</title>

    <!-- Bootstrap core CSS -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>

<body>
@include('layouts.nav')
@include('layouts.errors')
<div class="jumbotron">
    <div class="row">
        @yield('coursesList')
        @yield('studentsList')
        @yield('adminsList')

        <div class="col-sm-6">
            <div class="container">
                @yield('container')
            </div>

        </div>
    </div>
</div>

<script src="{{ asset('js/app.js') }}"></script>
</body>
</html>
