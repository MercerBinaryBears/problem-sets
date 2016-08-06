<!DOCTYPE html>
<html>
    <head>
        @section('styles')
        <link rel="stylesheet" type="text/css" href="{{ elixir('css/app.css') }}" />
        @show
    </head>
    <body>
        @yield('content')
        @section('scripts')
        @show
    </body>
</html>
