<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Book Appointment</title>

        <link href="{{ elixir('/css/cpanel/agenda/style.css') }}" rel="stylesheet">

    </head>  
    <body>
        <div id="url" style="display: none">{{url('')}}</div>
        
        @yield('content')
        
        <script src="{{ elixir('/js/cpanel/agenda/main.js') }}"></script>
        @yield('js')
    </body>
</html>
