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
@if($flash = session('message'))
<div class="alert alert-success" id="flash-message" role="alert">
    {{$flash}}
</div>
@endif
@include('layouts.nav')
@include('layouts.errors')
<div class="jumbotron">
    <div class="row">
        @yield('overview_lists')
        @yield('container')
    </div>
</div>

<script src="{{ asset('js/app.js') }}"></script>
</body>
</html>
