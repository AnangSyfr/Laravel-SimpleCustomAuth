<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body>
<div class="container">
    <form class="form" action="{{ route('loginPost')}}" method="post">
        {{ csrf_field() }}
        <div class="form-group">
            <label for="name" class="label-control">Username</label>
            <input type="text" class="form-control" id="name" name="name">
        </div>
        <div class="form-group">
            <label for="username" class="label-control">Password</label>
            <input type="text" class="form-control" id="password" name="password">
        </div>
        <input type="submit">
    </form>
</div>
</body>
</html>
