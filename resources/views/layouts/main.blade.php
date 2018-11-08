<!DOCTYPE html>
<html>
    <head>
        @section('styles')
        <link href='http://fonts.googleapis.com/css?family=Lato&subset=latin,latin-ext' rel='stylesheet' type='text/css'>
        <link rel="stylesheet" type="text/css" href="{{ elixir('css/app.css') }}" />
        @show
    </head>
    <body>
        @if (Auth::check())
            <a href="/logout">Logout</a>
            <a href="/admin">Admin</a>
            <br/>
        @endif
        @yield('content')
        @section('scripts')
        @show
    </body>
</html>
