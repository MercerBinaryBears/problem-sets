<!DOCTYPE html>
<html>
    <head>
        @section('styles')
        <link href='http://fonts.googleapis.com/css?family=Lato&subset=latin,latin-ext' rel='stylesheet' type='text/css'>
        <link rel="stylesheet" type="text/css" href="{{ elixir('css/app.css') }}" />
        @show
    </head>
    <body>
        @yield('content')
        @section('scripts')
        @show
    </body>
</html>
