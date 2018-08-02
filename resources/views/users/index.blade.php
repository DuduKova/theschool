<!doctype html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>INDEX</title>

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">

</head>
<body>
<ul>

@foreach($users as $user)

    <a href="/users/{{$user->id}}"><li>
            {{$user->name}}
            {{$user->phone}}
        </li></a>

@endforeach

</ul>
</body>
</html>